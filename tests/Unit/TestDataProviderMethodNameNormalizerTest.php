<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Generator;
use Ghostwriter\Testify\TestDataProviderMethodNameFormatter;
use Ghostwriter\Testify\TestDataProviderMethodNameNormalizer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestDataProviderMethodNameNormalizer::class)]
final class TestDataProviderMethodNameNormalizerTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProvidertestConstruct')]
    public function testConstruct(TestDataProviderMethodNameFormatter $testDataProviderMethodNameFormatter): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestNormalize')]
    public function testNormalize(string $name): void
    {
        self::assertTrue(true);
    }

    public static function dataProvidertestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestNormalize(): Generator
    {
        yield from [
            'testNormalize' => ['parameter-0'],
        ];
    }
}
