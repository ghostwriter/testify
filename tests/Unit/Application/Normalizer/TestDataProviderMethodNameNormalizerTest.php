<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Normalizer;

use Ghostwriter\Testify\Application\Normalizer\TestDataProviderMethodNameNormalizer;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(TestDataProviderMethodNameNormalizer::class)]
final class TestDataProviderMethodNameNormalizerTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
