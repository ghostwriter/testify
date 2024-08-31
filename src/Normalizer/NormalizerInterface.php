<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Normalizer;

interface NormalizerInterface
{
    public function normalize(string $name): string;
}
