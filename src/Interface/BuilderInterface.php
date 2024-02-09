<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface;

interface BuilderInterface
{
    public function build(string $file, string $testFile): GeneratorInterface;
}
