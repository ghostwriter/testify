<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Ghostwriter\Testify\TestBuilder;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestBuilder::class)]
final class TestBuilderTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
