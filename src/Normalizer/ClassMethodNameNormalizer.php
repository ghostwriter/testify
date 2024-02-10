<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Normalizer;

use Ghostwriter\CaseConverter\CaseConverter;
use Ghostwriter\Testify\Interface\NormalizerInterface;

final readonly class ClassMethodNameNormalizer implements NormalizerInterface
{
    public function __construct(
        private CaseConverter $caseConverter,
    ) {
    }
    public function normalize(string $name): string
    {
        return $this->caseConverter->camelCase($name);
    }
}
