<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Testify\Interface\GeneratorInterface;
use Ghostwriter\Testify\Interface\PrinterInterface;

final readonly class Printer implements PrinterInterface
{
    public function print(GeneratorInterface $generator): string
    {
        return $generator->generate();
    }
}
