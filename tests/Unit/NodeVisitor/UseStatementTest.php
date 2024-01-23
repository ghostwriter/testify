<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\NodeVisitor;

use Generator;
use Ghostwriter\Testify\NodeVisitor\UseStatement;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(UseStatement::class)]
final class UseStatementTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public function testAlias(): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderConstruct')]
    public function testConstruct(string $full): void
    {
        self::assertTrue(true);
    }

    public function testFull(): void
    {
        self::assertTrue(true);
    }

    public function testName(): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderConstruct(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }
}
