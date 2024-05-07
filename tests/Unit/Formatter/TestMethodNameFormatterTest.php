<?php

declare(strict_types=1);

namespace Tests\Unit\Formatter;

use Ghostwriter\Testify\Formatter\TestMethodNameFormatter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestMethodNameFormatter::class)]
final class TestMethodNameFormatterTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
