<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Formatter;

use Generator;
use Ghostwriter\Testify\Formatter\TestDataProviderMethodNameFormatter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestDataProviderMethodNameFormatter::class)]
final class TestDataProviderMethodNameFormatterTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderTestFormat')]
    public function testFormat(string $name): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderTestFormat(): Generator
    {
        yield from [
            'testFormat' => ['parameter-0'],
        ];
    }
}
