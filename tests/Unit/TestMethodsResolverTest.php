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
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProvidertestConstruct')]
    public function testConstruct(
        TestMethodNameNormalizer $testMethodNameNormalizer,
        TestDataProviderMethodNameNormalizer $testDataProviderMethodNameNormalizer
    ): void {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestResolve')]
    public function testResolve(string $class): void
    {
        self::assertTrue(true);
    }

    public static function dataProvidertestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1'],
        ];
    }

    public static function dataProvidertestResolve(): Generator
    {
        yield from [
            'testResolve' => ['parameter-0'],
        ];
    }
}
