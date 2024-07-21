<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface;

use Throwable;

interface CliPrinterInterface
{
    public function print(CommandInterface $command): string;

    public function printThrowable(Throwable $throwable): string;
}
