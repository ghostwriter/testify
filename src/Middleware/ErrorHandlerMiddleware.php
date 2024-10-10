<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Middleware;

use ErrorException;
use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\Handler\ExceptionHandler;
use Ghostwriter\Testify\Handler\HandlerInterface;
use Ghostwriter\Testify\Printer\CliPrinter;
use Ghostwriter\Testify\Printer\CliPrinterInterface;
use Override;
use Throwable;

final readonly class ErrorHandlerMiddleware implements MiddlewareInterface
{
    public function __construct(
        private ExceptionHandler $exceptionHandler,
        private CliPrinterInterface $cliPrinter
    ) {
    }

    public static function new(): self
    {
        return new self(new ExceptionHandler(new CliPrinter()), new CliPrinter());
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function process(CommandInterface $command, HandlerInterface $handler): int
    {
        //1: Catchall for general errors
        //2: Misuse of shell builtins (according to Bash documentation)
        //126: Command invoked cannot execute
        //127: "command not found"
        //128: Invalid argument to exit
        //128+n: Fatal error signal "n"
        //255: Exit status out of range (exit takes only integer args in the range 0 - 255)
        #define EX_NOPERM       77      /* permission denied */
        #define EX_CONFIG       78      /* configuration error */
        #define EX_IOERR        74      /* input/output error */
        \set_error_handler(static function (int $severity, string $message, string $filename, int $line): bool {
            if (0 === ($severity & \error_reporting())) {
                return false;
            }

            throw new ErrorException($message, 128, $severity, $filename, $line);
        });

        try {
            $exitCode = $handler->handle($command);
        } catch (Throwable $throwable) {
            $exitCode = $this->exceptionHandler->handle($command);

            echo $this->cliPrinter->printThrowable($throwable);
        } finally {
            \restore_error_handler();
        }

        return $exitCode;
    }
}
