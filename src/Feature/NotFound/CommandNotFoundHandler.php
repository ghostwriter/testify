<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Feature\NotFound;

use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\CommandHandler\CommandHandlerInterface;
use Ghostwriter\Testify\Printer\CliPrinterInterface;
use Override;

use const PHP_EOL;

final readonly class CommandNotFoundHandler implements CommandHandlerInterface
{
    public function __construct(
        private CliPrinterInterface $cliPrinter
    ) {}

    #[Override]
    public function handle(CommandInterface $command): int
    {
        echo $this->cliPrinter->print($command);

        echo 'Command handler not found' . PHP_EOL;

        return 1;
    }
}
