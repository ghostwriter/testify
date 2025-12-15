<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Handler;

use Ghostwriter\Testify\Application\Printer\CliPrinterInterface;
use Ghostwriter\Testify\Interface\Console\CommandInterface;
use Ghostwriter\Testify\Interface\Console\HandlerInterface;
use Override;

use const PHP_EOL;

final readonly class NotFoundHandler implements HandlerInterface
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
