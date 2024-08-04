<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Middleware;

use Ghostwriter\Testify\Handler\ExceptionHandler;
use Ghostwriter\Testify\Interface\CliPrinterInterface;
use Ghostwriter\Testify\Interface\CommandInterface;
use Ghostwriter\Testify\Interface\HandlerInterface;
use Ghostwriter\Testify\Interface\MiddlewareInterface;
use Override;
use Throwable;

use function restore_error_handler;
use function set_exception_handler;

final readonly class ExceptionHandlerMiddleware implements MiddlewareInterface
{
    public function __construct(
        private ExceptionHandler $exceptionHandler,
        private CliPrinterInterface $cliPrinter
    ) {
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function process(CommandInterface $command, HandlerInterface $handler): int
    {
        set_exception_handler(static function (Throwable $throwable): void {
            echo $throwable->getMessage();
        });

        try {
            $exitCode = $handler->handle($command);
        } catch (Throwable $throwable) {
            $exitCode = $this->exceptionHandler->handle($command);

            echo $this->cliPrinter->printThrowable($throwable);
        } finally {
            restore_exception_handler();
        }

        return $exitCode;
    }
}
