<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Printer;

use Ghostwriter\Testify\Generator\GeneratorInterface;
use Override;

final readonly class Printer implements PrinterInterface
{
    #[Override]
    public function print(GeneratorInterface $generator): string
    {
        return $generator->generate();
    }
}
