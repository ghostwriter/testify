<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Handler;

use Ghostwriter\Container\Attribute\Inject;
use Ghostwriter\Testify\CliPrinter;
use Ghostwriter\Testify\Interface\CliPrinterInterface;
use Ghostwriter\Testify\Interface\CommandInterface;
use Ghostwriter\Testify\Interface\HandlerInterface;
use Override;

final readonly class ExceptionHandler implements HandlerInterface
{
    public function __construct(
        #[Inject(CliPrinter::class)]
        private CliPrinterInterface $printer
    ) {
    }

    #[Override]
    public function handle(CommandInterface $command): int
    {
        echo $this->printer->print($command);

        return 127;
    }
}
