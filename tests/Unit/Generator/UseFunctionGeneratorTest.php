<?php

declare(strict_types=1);

namespace Tests\Unit\Generator;

use Ghostwriter\Testify\Generator\UseFunctionGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UseFunctionGenerator::class)]
final class UseFunctionGeneratorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
