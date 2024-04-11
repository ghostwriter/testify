<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Normalizer;

use Ghostwriter\Testify\Formatter\TestMethodNameFormatter;
use Ghostwriter\Testify\Interface\NormalizerInterface;

final readonly class TestMethodNameNormalizer implements NormalizerInterface
{
    public function __construct(
        private TestMethodNameFormatter $testMethodNameFormatter,
        private ClassMethodNameNormalizer $classMethodNormalizer,
    ) {}

    public function normalize(string $name): string
    {
        return $this->classMethodNormalizer->normalize($this->testMethodNameFormatter->format($name));
    }
}
