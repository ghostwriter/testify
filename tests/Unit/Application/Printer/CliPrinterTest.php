<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Printer;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Printer\CliPrinter;
use Ghostwriter\Testify\Application\Printer\CliPrinterInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(CliPrinter::class)]
final class CliPrinterTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationPrinterCliPrinterInterface(): void
    {
        self::assertClassImplementsInterface(CliPrinter::class, CliPrinterInterface::class);
    }
}
