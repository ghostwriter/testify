<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Handler;

use Ghostwriter\Container\Attribute\Inject;
use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\Printer\CliPrinter;
use Ghostwriter\Testify\Printer\CliPrinterInterface;
use Override;

final readonly class ExceptionHandler implements HandlerInterface
{
    public function __construct(
        #[Inject(CliPrinter::class)]
        private CliPrinterInterface $cliPrinter
    ) {
    }

    #[Override]
    public function handle(CommandInterface $command): int
    {
        echo $this->cliPrinter->print($command);

        return 127;
    }
}
