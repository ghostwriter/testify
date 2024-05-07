<?php

declare(strict_types=1);

namespace Tests\Unit\Normalizer;

use Ghostwriter\Testify\Normalizer\ClassNameNormalizer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ClassNameNormalizer::class)]
final class ClassNameNormalizerTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
