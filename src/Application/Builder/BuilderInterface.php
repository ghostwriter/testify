<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Builder;

use Ghostwriter\Testify\Application\Generator\GeneratorInterface;

interface BuilderInterface
{
    public function build(string $file, string $testFile): GeneratorInterface;
}
