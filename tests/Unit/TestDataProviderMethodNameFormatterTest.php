<?php 

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Generator;
use Ghostwriter\Testify\TestDataProviderMethodNameFormatter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestDataProviderMethodNameFormatter::class)]
final class TestDataProviderMethodNameFormatterTest extends TestCase
{
    public static function testFormatDataProvider(): Generator
    {
        yield from [
            'testFormat' => ['parameter-0'],
        ];
    }

    #[DataProvider('testFormatDataProvider')]
    public function testFormat(string $name): void
    {
        self::markTestSkipped('Not implemented yet.');
    }
}
