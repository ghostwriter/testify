<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Normalizer;

interface NormalizerInterface
{
    public function normalize(string $name): string;
}
