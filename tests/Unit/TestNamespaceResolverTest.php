<?php 

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Generator;
use Ghostwriter\Testify\TestNamespaceResolver;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestNamespaceResolver::class)]
final class TestNamespaceResolverTest extends TestCase
{
    public static function testResolveDataProvider(): Generator
    {
        yield from [
            'testResolve' => ['parameter-0'],
        ];
    }

    #[DataProvider('testResolveDataProvider')]
    public function testResolve(string $namespace): void
    {
        self::markTestSkipped('Not implemented yet.');
    }
}
