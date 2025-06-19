<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\ClassLike;

use Ghostwriter\Testify\Generator\ClassLike\InterfaceGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(InterfaceGenerator::class)]
final class InterfaceGeneratorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
