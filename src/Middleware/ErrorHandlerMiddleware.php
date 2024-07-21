<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Middleware;

use ErrorException;
use Ghostwriter\Testify\CliPrinter;
use Ghostwriter\Testify\Handler\ExceptionHandler;
use Ghostwriter\Testify\Interface\CliPrinterInterface;
use Ghostwriter\Testify\Interface\CommandInterface;
use Ghostwriter\Testify\Interface\HandlerInterface;
use Ghostwriter\Testify\Interface\MiddlewareInterface;
use Override;
use Throwable;

use function error_reporting;
use function restore_error_handler;
use function set_error_handler;

final readonly class ErrorHandlerMiddleware implements MiddlewareInterface
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
        set_error_handler(static function (int $severity, string $message, string $filename, int $line): bool {
            if (0 === ($severity & error_reporting())) {
                return false;
            }

            throw new ErrorException($message, 0, $severity, $filename, $line);
        });

        try {
            $exitCode = $handler->handle($command);
        } catch (Throwable $throwable) {
            $exitCode = $this->exceptionHandler->handle($command);

            echo $this->cliPrinter->printException($throwable);
        } finally {
            restore_error_handler();
        }

        return $exitCode;
    }

    public static function new(): self
    {
        return new self(new ExceptionHandler(new CliPrinter()), new CliPrinter());
    }
}
