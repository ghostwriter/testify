<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\ClassLikeMember;

use Ghostwriter\Testify\Generator\ClassLikeMember\PropertyGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PropertyGenerator::class)]
final class PropertyGeneratorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
