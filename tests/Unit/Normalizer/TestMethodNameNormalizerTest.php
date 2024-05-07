<?php

declare(strict_types=1);

namespace Tests\Unit\Normalizer;

use Ghostwriter\Testify\Normalizer\TestMethodNameNormalizer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestMethodNameNormalizer::class)]
final class TestMethodNameNormalizerTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
