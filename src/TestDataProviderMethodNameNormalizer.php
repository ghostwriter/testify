<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Testify\Interface\NormalizerInterface;

use function lcfirst;
use function ltrim;

final readonly class TestDataProviderMethodNameNormalizer implements NormalizerInterface
{
    public function __construct(
        private TestDataProviderMethodNameFormatter $testDataProviderMethodNameFormatter,
    ) {
    }

    public function normalize(string $name): string
    {
        return $this->testDataProviderMethodNameFormatter->format(lcfirst(ltrim($name, '_')));
    }
}
