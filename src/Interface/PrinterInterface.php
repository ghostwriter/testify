<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface;

interface PrinterInterface
{
    public function print(GeneratorInterface $generator): string;
}
