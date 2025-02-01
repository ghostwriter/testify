<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Feature\ErrorHandler;

use ErrorException;
use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\CommandHandler\CommandHandlerInterface;
use Ghostwriter\Testify\Feature\ExceptionHandler\ExceptionHandlerInterface;
use Ghostwriter\Testify\Middleware\MiddlewareInterface;
use Override;
use Throwable;

final readonly class ErrorHandlerMiddleware implements MiddlewareInterface
{
    public function __construct(
        private ExceptionHandlerInterface $exceptionHandler,
    ) {
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function process(CommandInterface $command, CommandHandlerInterface $commandHandler): int
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
            $exitCode = $commandHandler->handle($command);
        } catch (Throwable $throwable) {
            $exitCode = $this->exceptionHandler->handle($command, $throwable);
        } finally {
            \restore_error_handler();
        }

        return $exitCode;
    }
}
