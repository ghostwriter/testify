<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Printer;

use Ghostwriter\Testify\Generator\GeneratorInterface;

interface PrinterInterface
{
    public function print(GeneratorInterface $generator): string;
}
