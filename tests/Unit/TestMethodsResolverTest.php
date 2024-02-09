<?php 

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Generator;
use Ghostwriter\Testify\TestDataProviderMethodNameNormalizer;
use Ghostwriter\Testify\TestMethodNameNormalizer;
use Ghostwriter\Testify\TestMethodsResolver;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestMethodsResolver::class)]
final class TestMethodsResolverTest extends TestCase
{
    public static function testConstructDataProvider(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1'],
        ];
    }

    #[DataProvider('testConstructDataProvider')]
    public function testConstruct(TestMethodNameNormalizer $testMethodNameNormalizer, TestDataProviderMethodNameNormalizer $testDataProviderMethodNameNormalizer): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public static function testResolveDataProvider(): Generator
    {
        yield from [
            'testResolve' => ['parameter-0'],
        ];
    }

    #[DataProvider('testResolveDataProvider')]
    public function testResolve(string $class): void
    {
        self::markTestSkipped('Not implemented yet.');
    }
}
