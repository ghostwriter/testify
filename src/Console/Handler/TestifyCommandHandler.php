<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Handler;

use Ghostwriter\Container\Attribute\Inject;
use Ghostwriter\Testify\Interface\CliPrinterInterface;
use Ghostwriter\Testify\Interface\CommandInterface;
use Ghostwriter\Testify\Interface\HandlerInterface;
use Ghostwriter\Testify\Printer\CliPrinter;
use Override;

final readonly class TestifyCommandHandler implements HandlerInterface
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

        return $command->execute();
    }
}
