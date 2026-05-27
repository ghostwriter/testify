<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Normalizer;

use Ghostwriter\Testify\Application\Normalizer\NormalizerInterface;
use Ghostwriter\Testify\Application\Normalizer\TestDataProviderMethodNameNormalizer;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(TestDataProviderMethodNameNormalizer::class)]
final class TestDataProviderMethodNameNormalizerTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationNormalizerNormalizerInterface(): void
    {
        self::assertTrue(is_a(TestDataProviderMethodNameNormalizer::class, NormalizerInterface::class, true));
    }
}
