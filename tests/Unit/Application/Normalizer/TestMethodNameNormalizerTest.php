<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Normalizer;

use Ghostwriter\Testify\Application\Normalizer\NormalizerInterface;
use Ghostwriter\Testify\Application\Normalizer\TestMethodNameNormalizer;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(TestMethodNameNormalizer::class)]
final class TestMethodNameNormalizerTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationNormalizerNormalizerInterface(): void
    {
        self::assertTrue(is_a(TestMethodNameNormalizer::class, NormalizerInterface::class, true));
    }
}
