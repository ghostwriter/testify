<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Name;

use Ghostwriter\Testify\Generator\Name\ClassNameGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ClassNameGenerator::class)]
final class ClassNameGeneratorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
