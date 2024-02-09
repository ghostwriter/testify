<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Normalizer;

use Ghostwriter\Testify\Interface\NormalizerInterface;

use function mb_strtoupper;
use function str_replace;

final readonly class ClassConstantNameNormalizer implements NormalizerInterface
{
    public function normalize(string $name): string
    {
        return mb_strtoupper(str_replace(['-', '_'], ' ', $name));
    }
}
