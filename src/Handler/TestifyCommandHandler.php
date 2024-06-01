<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Handler;

use Ghostwriter\Testify\Interface\CliPrinterInterface;
use Ghostwriter\Testify\Interface\CommandInterface;
use Ghostwriter\Testify\Interface\HandlerInterface;
use Override;

final readonly class TestifyCommandHandler implements HandlerInterface
{
    public function __construct(
        private CliPrinterInterface $printer
    ) {}

    #[Override]
    public function handle(CommandInterface $command): int
    {
        // echo $this->printer->print($command);

        return $command->execute();
    }
}
