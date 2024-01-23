<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\NodeVisitor;

use Generator;
use Ghostwriter\Testify\NodeVisitor\ImportFullyQualifiedNamesNodeVisitor;
use Ghostwriter\Testify\NodeVisitor\UseStatements;
use PhpParser\Node;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Namespace_;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(ImportFullyQualifiedNamesNodeVisitor::class)]
final class ImportFullyQualifiedNamesNodeVisitorTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderConstruct')]
    public function testConstruct(UseStatements $uses): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderEnterName')]
    public function testEnterName(Name $node): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderEnterNamespace')]
    public function testEnterNamespace(Namespace_ $node): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderEnterNode')]
    public function testEnterNode(Node $node): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderLeaveNamespace')]
    public function testLeaveNamespace(Namespace_ $node): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderLeaveNode')]
    public function testLeaveNode(Node $node): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderConstruct(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderEnterName(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderEnterNamespace(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderEnterNode(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderLeaveNamespace(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderLeaveNode(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }
}
