<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Printer;

use Ghostwriter\Testify\Command\CommandInterface;
use Throwable;

interface CliPrinterInterface
{
    public function print(CommandInterface $command): string;

    public function printThrowable(Throwable $throwable): string;
}
