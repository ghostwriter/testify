<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Normalizer;

use Ghostwriter\Testify\Normalizer\TestDataProviderMethodNameNormalizer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestDataProviderMethodNameNormalizer::class)]
final class TestDataProviderMethodNameNormalizerTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
