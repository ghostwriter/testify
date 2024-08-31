<?php

declare(strict_types=1);

namespace Tests\Unit\Printer;

use Ghostwriter\Testify\Printer\Printer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Printer::class)]
final class PrinterTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
