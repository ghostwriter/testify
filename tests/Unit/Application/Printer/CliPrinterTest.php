<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Printer;

use Ghostwriter\Testify\Application\Printer\CliPrinter;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(CliPrinter::class)]
final class CliPrinterTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
