<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\Testify\CliPrinter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CliPrinter::class)]
final class CliPrinterTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
