<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Normalizer;

use Ghostwriter\Testify\Application\Normalizer\ClassMethodNameNormalizer;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ClassMethodNameNormalizer::class)]
final class ClassMethodNameNormalizerTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
