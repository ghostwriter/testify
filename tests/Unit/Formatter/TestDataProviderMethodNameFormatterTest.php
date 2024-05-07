<?php

declare(strict_types=1);

namespace Tests\Unit\Formatter;

use Ghostwriter\Testify\Formatter\TestDataProviderMethodNameFormatter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestDataProviderMethodNameFormatter::class)]
final class TestDataProviderMethodNameFormatterTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
