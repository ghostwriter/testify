<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Composer\InstalledVersions;
use Ghostwriter\Container\Container;
use Ghostwriter\Testify\Command\TestifyCommand;
use Throwable;
use ErrorException;
use Override;
use RuntimeException;

use function define;
use function defined;
use function error_reporting;
use function ini_set;
use function restore_error_handler;
use function set_error_handler;
use function array_merge;
use function array_shift;
use function fwrite;
use function sprintf;
use function is_int;

use const PHP_EOL;
use const STDERR;

interface Middleware
{
    public function process(Command $command, Handler $handler): int;
}

interface CommandBus
{
    public function dispatch(Command $command): int;
}

interface Command
{
    public function execute(): int;
}

interface Handler
{
    public function handle(Command $command): int;
}

final readonly class ErrorHandlerMiddleware implements Middleware
{
    public static function new(): self
    {
        return new self();
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function process(Command $command, Handler $handler): int
    {
        set_error_handler(static function (int $severity, string $message, string $filename, int $line): bool {
            if (0 === ($severity & error_reporting())) {
                return false;
            }

            throw new ErrorException($message, 0, $severity, $filename, $line);
        });

        try {
            $exitCode = $handler->handle($command);
        } catch (Throwable $e) {
            $exitCode = $e->getCode();
            if (! is_int($exitCode)) {
                $exitCode = 1;
            }

            fwrite(STDERR, sprintf(
                '[%s %s] %s: ' . PHP_EOL . '%s',
                $e::class,
                $exitCode,
                $e->getMessage(),
                $e->getTraceAsString()
            ));
        } finally {
            restore_error_handler();
        }

        return $exitCode;
    }
}

final class Middlewares implements Middleware
{
    /**
     * @var Middleware[]
     */
    private array $middlewares;

    public function __construct(
        Middleware ...$middlewares
    ) {
        $this->middlewares = $middlewares;
    }

    public static function new(Middleware ...$middlewares): self
    {
        return new self(...$middlewares);
    }

    public function add(Middleware ...$middlewares): void
    {
        $this->middlewares = array_merge($this->middlewares, $middlewares);
    }

    #[Override]
    public function process(Command $command, Handler $handler): int
    {
        if ($this->middlewares === []) {
            return $handler->handle($command);
        }

        $middleware = array_shift($this->middlewares);

        if (! $middleware instanceof Middleware) {
            throw new RuntimeException('Middleware must implement Middleware interface');
        }

        return $middleware->process($command, $handler);
    }
}
final readonly class Testify implements CommandBus, Handler, Middleware
{
    public function __construct(
        public Middlewares $middlewares
    ) {
        if (! defined('TESTIFY_VERSION')) {
            define('TESTIFY_VERSION', InstalledVersions::getVersion('ghostwriter/testify'));
        }

        ini_set('memory_limit', '-1');
    }

    public static function new(Middleware ...$middlewares): self
    {
        return new self(Middlewares::new(ErrorHandlerMiddleware::new(), ...$middlewares));
    }

    public function run(): int
    {
        return $this->dispatch(new readonly class () implements Command {
            #[Override]
            public function execute(): int
            {
                $container = Container::getInstance();

                if (! $container->has(ServiceProvider::class)) {
                    $container->provide(ServiceProvider::class);
                }

                return $container->get(TestifyCommand::class)->run();
            }
        });
    }

    #[Override]
    public function dispatch(Command $command): int
    {
        return $this->middlewares->process($command, $this);
    }

    #[Override]
    public function handle(Command $command): int
    {
        return $command->execute();
    }

    #[Override]
    public function process(Command $command, Handler $handler): int
    {
        return $this->middlewares->process($command, $handler);
    }
}
