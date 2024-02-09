<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Testify\Interface\NormalizerInterface;

use function ltrim;
use function ucfirst;

final readonly class TestMethodNameNormalizer implements NormalizerInterface
{
    public function __construct(
        private TestMethodNameFormatter $testMethodNameFormatter,
    ) {
    }

    public function normalize(string $name): string
    {
        return $this->testMethodNameFormatter->format(ucfirst(ltrim($name, '_')));
    }
}
