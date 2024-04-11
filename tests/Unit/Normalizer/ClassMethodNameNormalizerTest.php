<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Normalizer;

use Ghostwriter\Testify\Normalizer\ClassMethodNameNormalizer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ClassMethodNameNormalizer::class)]
final class ClassMethodNameNormalizerTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
