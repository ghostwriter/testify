<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\ClassLike;

use Ghostwriter\Testify\Generator\ClassLike\ClassGenerator;
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
