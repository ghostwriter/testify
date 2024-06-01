<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Testify\Interface\CliPrinterInterface;
use Ghostwriter\Testify\Interface\CommandInterface;
use Override;
use Throwable;

use function sprintf;

use const PHP_EOL;

final readonly class CliPrinter implements CliPrinterInterface
{
    public function print(CommandInterface $command): string
    {
        return sprintf(PHP_EOL . 'Command: %s' . PHP_EOL, $command::class);
    }

    #[Override]
    public function printThrowable(Throwable $exception): string
    {
        return sprintf(
            PHP_EOL . '[%s] %s: ' . PHP_EOL . '%s' . PHP_EOL,
            $exception::class,
            $exception->getMessage(),
            $exception->getTraceAsString()
        );
    }
}
