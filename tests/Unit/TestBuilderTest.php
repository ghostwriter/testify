<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Generator;
use Ghostwriter\Testify\FileResolver;
use Ghostwriter\Testify\TestBuilder;
use Ghostwriter\Testify\TestMethodsResolver;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestBuilder::class)]
final class TestBuilderTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProvidertestBuild')]
    public function testBuild(string $file, string $testFile): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestConstruct')]
    public function testConstruct(TestMethodsResolver $testMethodsResolver, FileResolver $fileResolver): void
    {
        self::assertTrue(true);
    }

    public static function dataProvidertestBuild(): Generator
    {
        yield from [
            'testBuild' => ['parameter-0', 'parameter-1'],
        ];
    }

    public static function dataProvidertestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1'],
        ];
    }
}
