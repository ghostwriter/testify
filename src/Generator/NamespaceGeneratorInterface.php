<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

interface NamespaceGeneratorInterface extends GeneratorInterface
{
    public function name(): string;
}
