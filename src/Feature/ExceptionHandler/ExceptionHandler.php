<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Feature\ExceptionHandler;

use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\Printer\CliPrinterInterface;
use Override;
use Throwable;

final readonly class ExceptionHandler implements ExceptionHandlerInterface
{
    public function __construct(
        private CliPrinterInterface $cliPrinter
    ) {}

    #[Override]
    public function handle(CommandInterface $command, Throwable $throwable): int
    {
        echo $this->cliPrinter->printThrowable($throwable);

        return 127;
    }
}
