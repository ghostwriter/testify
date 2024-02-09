<?php 

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Generator;
use Ghostwriter\Testify\TestMethodNameFormatter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestMethodNameFormatter::class)]
final class TestMethodNameFormatterTest extends TestCase
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
