<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Printer;

use Ghostwriter\Testify\Application\Printer\CliPrinter;
use Ghostwriter\Testify\Application\Printer\CliPrinterInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(CliPrinter::class)]
final class CliPrinterTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationPrinterCliPrinterInterface(): void
    {
        self::assertTrue(is_a(CliPrinter::class, CliPrinterInterface::class, true));
    }
}
