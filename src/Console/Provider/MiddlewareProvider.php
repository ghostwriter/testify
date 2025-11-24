<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Provider;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Testify\Console\Command\CommandInterface;
use Ghostwriter\Testify\Console\Command\TestifyCommand;
use Ghostwriter\Testify\Console\Middleware\ErrorHandlerMiddleware;
use Ghostwriter\Testify\Console\Middleware\ExceptionHandlerMiddleware;
use Ghostwriter\Testify\Console\Middleware\HelpCommandMiddleware;
use Ghostwriter\Testify\Console\Middleware\MiddlewareInterface;
use Ghostwriter\Testify\Console\Middleware\TestifyCommandMiddleware;
use Override;
use RuntimeException;
use Throwable;

use function array_key_exists;
use function array_keys;
use function array_map;
use function is_a;
use function sprintf;

final class MiddlewareProvider implements MiddlewareProviderInterface
{
    //    /**
    //     * @var list<class-string<MiddlewareInterface>>
    //     */
    //    private const array DEFAULT_MIDDLEWARES = [
    //        ErrorHandlerMiddleware::class,
    //        ExceptionHandlerMiddleware::class,
    //        HelpCommandMiddleware::class,
    //    ];

    /**
     * @param array<class-string<CommandInterface>,array<class-string<MiddlewareInterface>,bool>> $middlewares
     */
    public function __construct(
        private readonly ContainerInterface $container,
        private array $middlewares = [
            //            TestifyCommand::class => [
            //                TestifyCommandMiddleware::class => true,
            //            ],
        ]
    ) {}

    /**
     * @param class-string<CommandInterface>    $command
     * @param class-string<MiddlewareInterface> $middleware
     */
    public function add(string $command, string $middleware): void
    {
        if (! is_a($command, CommandInterface::class, true)) {
            throw new RuntimeException(sprintf('Command %s must implement %s', $command, CommandInterface::class));
        }

        if (! is_a($middleware, MiddlewareInterface::class, true)) {
            throw new RuntimeException(
                sprintf('Middleware %s must implement %s', $middleware, MiddlewareInterface::class),
            );
        }

        $this->middlewares[$command][$middleware] = true;
    }

    /**
     * @throws Throwable
     *
     * @return list<MiddlewareInterface>
     */
    #[Override]
    public function provide(CommandInterface $command): array
    {
        if (! array_key_exists($command::class, $this->middlewares)) {
            return [];
        }

        $middlewares = array_keys($this->middlewares[$command::class]);

        $container = $this->container;

        return array_map(
            static fn (string $middleware): MiddlewareInterface => $container->get($middleware),
            $middlewares,
        );
    }
}
