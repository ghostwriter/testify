<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Printer;

use Ghostwriter\Testify\Command\CommandInterface;
use Override;
use Throwable;

use const PHP_EOL;
use const STDOUT;

use function fwrite;
use function sprintf;

final readonly class CliPrinter implements CliPrinterInterface
{
    #[Override]
    public function print(CommandInterface $command): string
    {
        fwrite(STDOUT, sprintf(
            PHP_EOL . '%s by %s and contributors. %s' . PHP_EOL . PHP_EOL,
            'Testify',
            'Nathanael Esayeas',
            $this->highlight('#BlackLivesMatter')
        ));

        return sprintf('Command: %s' . PHP_EOL, $command::class);
    }

    #[Override]
    public function printThrowable(Throwable $throwable): string
    {
        return sprintf(
            PHP_EOL . '[%s] %s: ' . PHP_EOL . PHP_EOL . '%s' . PHP_EOL . PHP_EOL,
            $throwable::class,
            $throwable->getMessage(),
            $throwable->getTraceAsString()
        );
    }

    private function highlight(string $thing): string
    {
        return sprintf("\x1B[1;32m%s\x1B[0m", $thing);
    }
}
