<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Builder;

use Ghostwriter\Testify\Generator\GeneratorInterface;

interface BuilderInterface
{
    public function build(string $file, string $testFile): GeneratorInterface;
}
