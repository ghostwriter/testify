<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Normalizer;

use Generator;
use Ghostwriter\Testify\Formatter\TestDataProviderMethodNameFormatter;
use Ghostwriter\Testify\Normalizer\ClassMethodNameNormalizer;
use Ghostwriter\Testify\Normalizer\TestDataProviderMethodNameNormalizer;
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

    #[DataProvider('dataProviderTestConstruct')]
    public function testConstruct(
        TestDataProviderMethodNameFormatter $testDataProviderMethodNameFormatter,
        ClassMethodNameNormalizer $classMethodNormalizer
    ): void {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestNormalize')]
    public function testNormalize(string $name): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderTestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1'],
        ];
    }

    public static function dataProviderTestNormalize(): Generator
    {
        yield from [
            'testNormalize' => ['parameter-0'],
        ];
    }
}
