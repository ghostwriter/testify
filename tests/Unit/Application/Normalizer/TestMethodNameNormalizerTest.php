<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Normalizer;

use Ghostwriter\Testify\Application\Normalizer\TestMethodNameNormalizer;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(TestMethodNameNormalizer::class)]
final class TestMethodNameNormalizerTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
