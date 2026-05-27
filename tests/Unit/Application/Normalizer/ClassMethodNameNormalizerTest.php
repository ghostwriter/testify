<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Normalizer;

use Ghostwriter\Testify\Application\Normalizer\ClassMethodNameNormalizer;
use Ghostwriter\Testify\Application\Normalizer\NormalizerInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(ClassMethodNameNormalizer::class)]
final class ClassMethodNameNormalizerTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationNormalizerNormalizerInterface(): void
    {
        self::assertTrue(is_a(ClassMethodNameNormalizer::class, NormalizerInterface::class, true));
    }
}
