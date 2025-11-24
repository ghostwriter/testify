<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\ExceptionHandler;

use Ghostwriter\Testify\Application\Printer\CliPrinterInterface;
use Ghostwriter\Testify\Console\Command\CommandInterface;
use Ghostwriter\Testify\Console\Handler\HandlerInterface;
use Override;
use Throwable;

final readonly class ExceptionHandler implements ExceptionHandlerInterface
{
    public function __construct(
        private CliPrinterInterface $cliPrinter
    ) {}

    #[Override]
    public function handle(Throwable $throwable, CommandInterface $command, HandlerInterface $commandHandler): int
    {
        echo $this->cliPrinter->printThrowable($throwable);

        return 127;
    }
}
