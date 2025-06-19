<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\ClassLikeMember;

use Ghostwriter\Testify\Generator\ClassLikeMember\MethodGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(MethodGenerator::class)]
final class MethodGeneratorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
