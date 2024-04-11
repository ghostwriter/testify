<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Ghostwriter\Testify\Generator\ClassGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ClassGenerator::class)]
final class ClassGeneratorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
