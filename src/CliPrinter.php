<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Testify\Interface\CliPrinterInterface;
use Ghostwriter\Testify\Interface\CommandInterface;
use Override;
use Throwable;

use const PHP_EOL;

use function sprintf;

final readonly class CliPrinter implements CliPrinterInterface
{
    #[Override]
    public function print(CommandInterface $command): string
    {
        return sprintf(PHP_EOL . 'Command: %s' . PHP_EOL, $command::class);
    }

    #[Override]
    public function printThrowable(Throwable $throwable): string
    {
        return sprintf(
            PHP_EOL . '[%s] %s: ' . PHP_EOL . '%s' . PHP_EOL,
            $throwable::class,
            $throwable->getMessage(),
            $throwable->getTraceAsString()
        );
    }
}
