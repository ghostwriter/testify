<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Normalizer;

use Ghostwriter\Testify\Application\Normalizer\ClassConstantNameNormalizer;
use Ghostwriter\Testify\Application\Normalizer\NormalizerInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(ClassConstantNameNormalizer::class)]
final class ClassConstantNameNormalizerTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationNormalizerNormalizerInterface(): void
    {
        self::assertTrue(is_a(ClassConstantNameNormalizer::class, NormalizerInterface::class, true));
    }
}
