<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Normalizer;

use Ghostwriter\Testify\Formatter\TestDataProviderMethodNameFormatter;
use Ghostwriter\Testify\Interface\NormalizerInterface;

final readonly class TestDataProviderMethodNameNormalizer implements NormalizerInterface
{
    public function __construct(
        private TestDataProviderMethodNameFormatter $testDataProviderMethodNameFormatter,
        private ClassMethodNameNormalizer $classMethodNormalizer,
    ) {}

    public function normalize(string $name): string
    {
        return $this->classMethodNormalizer->normalize($this->testDataProviderMethodNameFormatter->format($name));
    }
}
