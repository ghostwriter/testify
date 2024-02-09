<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Generator;
use Ghostwriter\Testify\Interface\GeneratorInterface;
use Ghostwriter\Testify\Printer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(Printer::class)]
final class PrinterTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderTestPrint')]
    public function testPrint(GeneratorInterface $generator): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderTestPrint(): Generator
    {
        yield from [
            'testPrint' => ['parameter-0'],
        ];
    }
}
