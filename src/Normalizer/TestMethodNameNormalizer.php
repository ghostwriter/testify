<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Normalizer;

use Ghostwriter\Testify\Formatter\TestMethodNameFormatter;

use function ucfirst;

final readonly class TestMethodNameNormalizer
{
    public function __construct(
        private TestMethodNameFormatter $testMethodNameFormatter = new TestMethodNameFormatter(),
    ) {
    }

    public function normalize(string $methodName): string
    {
        return $this->testMethodNameFormatter->format(ucfirst($methodName));
    }
}
