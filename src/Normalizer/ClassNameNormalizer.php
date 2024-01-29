<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Normalizer;

use function str_replace;

final readonly class ClassNameNormalizer
{
    public function normalize(string $className): string
    {
        return str_replace('\\', '', $className);
    }
}
