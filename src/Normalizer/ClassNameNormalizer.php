<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Normalizer;

use Ghostwriter\CaseConverter\CaseConverter;
use Override;

final readonly class ClassNameNormalizer implements NormalizerInterface
{
    public function __construct(
        private CaseConverter $caseConverter,
    ) {}

    #[Override]
    public function normalize(string $name): string
    {
        return $this->caseConverter->toPascalCase($name);
    }
}
