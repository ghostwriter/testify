<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Feature\Testify;

use Ghostwriter\Container\Attribute\Inject;
use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\CommandHandler\CommandHandlerInterface;
use Ghostwriter\Testify\Printer\CliPrinter;
use Ghostwriter\Testify\Printer\CliPrinterInterface;
use Override;

final readonly class TestifyCommandHandler implements CommandHandlerInterface
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
