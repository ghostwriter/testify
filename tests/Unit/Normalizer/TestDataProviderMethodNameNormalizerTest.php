<?php

declare(strict_types=1);

namespace Tests\Unit\Normalizer;

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
