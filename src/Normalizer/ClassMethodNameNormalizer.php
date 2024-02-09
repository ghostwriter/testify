<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Normalizer;

use Ghostwriter\Testify\Interface\NormalizerInterface;

use function lcfirst;
use function str_replace;
use function ucwords;

final readonly class ClassMethodNameNormalizer implements NormalizerInterface
{
    public function normalize(string $name): string
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $name))));
    }
}
