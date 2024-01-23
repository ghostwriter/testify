<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\NodeVisitor;

use Generator;
use Ghostwriter\Testify\NodeVisitor\SortUseStatementsAlphabeticallyNodeVisitor;
use PhpParser\Node;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(SortUseStatementsAlphabeticallyNodeVisitor::class)]
final class SortUseStatementsAlphabeticallyNodeVisitorTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderLeaveNode')]
    public function testLeaveNode(Node $node): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderLeaveNode(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }
}
