<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Normalizer;

use Ghostwriter\Testify\Interface\NormalizerInterface;

use function str_replace;
use function ucwords;

final readonly class ClassNameNormalizer implements NormalizerInterface
{
    public function normalize(string $name): string
    {
        return str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $name)));
    }
}
