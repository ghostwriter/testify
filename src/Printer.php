<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Testify\Interface\GeneratorInterface;
use Ghostwriter\Testify\Interface\PrinterInterface;
use Override;

final readonly class Printer implements PrinterInterface
{
    #[Override]
    public function print(GeneratorInterface $generator): string
    {
        return $generator->generate();
    }
}
