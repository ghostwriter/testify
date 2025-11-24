<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Generator;

interface NamespaceGeneratorInterface extends GeneratorInterface
{
    public function name(): string;
}
