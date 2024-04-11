<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Ghostwriter\Testify\Generator\StaticCallGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(StaticCallGenerator::class)]
final class StaticCallGeneratorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
