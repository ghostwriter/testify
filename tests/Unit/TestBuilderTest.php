<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Generator;
use Ghostwriter\Testify\TestBuilder;
use PhpParser\BuilderFactory;
use PhpParser\NodeTraverser;
use PhpParser\PrettyPrinter\Standard;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Psalm\Internal\Analyzer\ProjectAnalyzer;

#[CoversClass(TestBuilder::class)]
final class TestBuilderTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderBuild')]
    public function testBuild(string $file): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderCheck')]
    public function testCheck(string $file): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderConstruct')]
    public function testConstruct(
        ProjectAnalyzer $projectAnalyzer,
        BuilderFactory $builderFactory,
        Standard $printer,
        NodeTraverser $traverser
    ): void {
        self::assertTrue(true);
    }

    public static function dataProviderBuild(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderCheck(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderConstruct(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }
}
