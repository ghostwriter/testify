<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Normalizer;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Normalizer\ClassMethodNameNormalizer;
use Ghostwriter\Testify\Application\Normalizer\NormalizerInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(ClassMethodNameNormalizer::class)]
final class ClassMethodNameNormalizerTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationNormalizerNormalizerInterface(): void
    {
        self::assertClassImplementsInterface(ClassMethodNameNormalizer::class, NormalizerInterface::class);
    }
}
