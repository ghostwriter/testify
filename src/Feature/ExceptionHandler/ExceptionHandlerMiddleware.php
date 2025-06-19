<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Feature\ExceptionHandler;

use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\CommandHandler\CommandHandlerInterface;
use Ghostwriter\Testify\Middleware\MiddlewareInterface;
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
    public function process(CommandInterface $command, CommandHandlerInterface $commandHandler): int
    {
        set_exception_handler(static function (Throwable $throwable): void {
            echo $throwable->getMessage();
        });

        try {
            $exitCode = $commandHandler->handle($command);
        } catch (Throwable $throwable) {
            $exitCode = $this->exceptionHandler->handle($command, $throwable);
        } finally {
            restore_exception_handler();
        }

        return $exitCode;
    }
}
