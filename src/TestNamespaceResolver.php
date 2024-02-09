<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use function explode;
use function implode;

final readonly class TestNamespaceResolver
{
    public function resolve(string $namespace): string
    {
        $namespaces = explode('\\', $namespace);

        $namespaces[1] .= 'Tests\\Unit';

        return implode('\\', $namespaces);
    }
}
