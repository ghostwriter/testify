<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Name;

use Ghostwriter\Testify\Generator\Name\InterfaceNameGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(InterfaceNameGenerator::class)]
final class InterfaceNameGeneratorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
