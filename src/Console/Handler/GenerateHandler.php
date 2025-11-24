<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Handler;

use Ghostwriter\Testify\Application\Printer\CliPrinterInterface;
use Ghostwriter\Testify\Console\Command\CommandInterface;
use Override;

final readonly class GenerateHandler implements HandlerInterface
{
    public function __construct(
        private CliPrinterInterface $cliPrinter
    ) {}

    #[Override]
    public function handle(CommandInterface $command): int
    {
        echo $this->cliPrinter->print($command);

        return $command->execute();
    }
}
