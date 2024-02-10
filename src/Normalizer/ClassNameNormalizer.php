<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Normalizer;

use Ghostwriter\CaseConverter\CaseConverter;
use Ghostwriter\Testify\Interface\NormalizerInterface;

use function str_replace;
use function ucwords;

final readonly class ClassNameNormalizer implements NormalizerInterface
{
    public function __construct(
        private CaseConverter $caseConverter,
    ) {
    }

    public function normalize(string $name): string
    {
        return $this->caseConverter->pascalCase($name);
    }
}
