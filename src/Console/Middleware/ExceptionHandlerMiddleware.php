<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Middleware;

use Ghostwriter\Testify\Console\Command\CommandInterface;
use Ghostwriter\Testify\Console\ExceptionHandler\ExceptionHandler;
use Ghostwriter\Testify\Console\Handler\HandlerInterface;
use Override;
use Throwable;

use function restore_exception_handler;
use function set_exception_handler;

final readonly class ExceptionHandlerMiddleware implements MiddlewareInterface
{
    public function __construct(
        private ExceptionHandler $exceptionHandler,
    ) {}

    /**
     * @throws Throwable
     */
    #[Override]
    public function process(CommandInterface $command, HandlerInterface $commandHandler): int
    {
        set_exception_handler(static function (Throwable $throwable): void {
            echo $throwable->getMessage();
        });

        try {
            $exitCode = $commandHandler->handle($command);
        } catch (Throwable $throwable) {
            $exitCode = $this->exceptionHandler->handle($throwable, $command, $commandHandler);
        } finally {
            restore_exception_handler();
        }

        return $exitCode;
    }
}
