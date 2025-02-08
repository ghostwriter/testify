<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Feature\ErrorHandler;

use ErrorException;
use Override;

use function error_reporting;

final readonly class ErrorHandler implements ErrorHandlerInterface
{
    #[Override]
    public function __invoke(int $severity, string $message, string $file, int $line): void
    {
        if (0 === (error_reporting() & $severity)) {
            // error_reporting does not include this error
            return;
        }

        throw new ErrorException($message, 0, $severity, $file, $line);
        //        \set_error_handler($this->errorHandler);
        //
        //        try {
        //            $exitCode = ($this->commandHandler)($command);
        //        } catch (Throwable $throwable) {
        //            return ($this->exceptionHandler)($throwable, $command);
        //        }
        //
        //        \restore_error_handler();
        //
        //        return $exitCode;
    }
}
