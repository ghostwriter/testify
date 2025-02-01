<?php

declare(strict_types=1);

namespace Tests\Unit\Generator;

use Ghostwriter\Testify\Generator\TestMethodGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestMethodGenerator::class)]
final class TestMethodGeneratorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
