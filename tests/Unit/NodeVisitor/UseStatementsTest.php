<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\NodeVisitor;

use Generator;
use Ghostwriter\Testify\NodeVisitor\UseStatements;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(UseStatements::class)]
final class UseStatementsTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderGet')]
    public function testGet(string $name): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderHas')]
    public function testHas(string $name): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderSet')]
    public function testSet(string $name): void
    {
        self::assertTrue(true);
    }

    public function testUses(): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderGet(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderHas(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderSet(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }
}
