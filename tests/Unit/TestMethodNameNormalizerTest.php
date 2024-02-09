<?php 

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Generator;
use Ghostwriter\Testify\TestMethodNameFormatter;
use Ghostwriter\Testify\TestMethodNameNormalizer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestMethodNameNormalizer::class)]
final class TestMethodNameNormalizerTest extends TestCase
{
    public static function testConstructDataProvider(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0'],
        ];
    }

    #[DataProvider('testConstructDataProvider')]
    public function testConstruct(TestMethodNameFormatter $testMethodNameFormatter): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public static function testNormalizeDataProvider(): Generator
    {
        yield from [
            'testNormalize' => ['parameter-0'],
        ];
    }

    #[DataProvider('testNormalizeDataProvider')]
    public function testNormalize(string $name): void
    {
        self::markTestSkipped('Not implemented yet.');
    }
}
