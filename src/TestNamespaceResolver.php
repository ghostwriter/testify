<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use function explode;
use function implode;

final readonly class TestNamespaceResolver
{
    public function resolve(string $namespace): string
    {
        /** @var list<string> $namespaces */
        $namespaces = explode('\\', $namespace, 3);
        if ($namespaces === []) {
            return 'Tests\\Unit';
        }

        $namespaces[0] = 'Tests';

        $namespaces[1] = 'Unit';

        return implode('\\', $namespaces);
    }
}
