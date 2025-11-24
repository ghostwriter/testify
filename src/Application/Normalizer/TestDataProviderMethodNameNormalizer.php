<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Normalizer;

use Ghostwriter\Testify\Application\Formatter\TestDataProviderMethodNameFormatter;
use Override;

final readonly class TestDataProviderMethodNameNormalizer implements NormalizerInterface
{
    public function __construct(
        private TestDataProviderMethodNameFormatter $testDataProviderMethodNameFormatter,
        private ClassMethodNameNormalizer $classMethodNameNormalizer,
    ) {}

    #[Override]
    public function normalize(string $name): string
    {
        return $this->classMethodNameNormalizer->normalize($this->testDataProviderMethodNameFormatter->format($name));
    }
}
