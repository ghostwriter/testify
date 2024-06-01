<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Handler;

use Ghostwriter\Testify\Interface\CliPrinterInterface;
use Ghostwriter\Testify\Interface\CommandInterface;
use Ghostwriter\Testify\Interface\HandlerInterface;

use const PHP_EOL;

final readonly class NotFoundHandler implements HandlerInterface
{
    public function __construct(
        private CliPrinterInterface $printer
    ) {}

    #[Override]
    public function handle(CommandInterface $command): int
    {
        echo $this->printer->print($command);

        echo 'Command handler not found' . PHP_EOL;

        return 1;
    }
}
