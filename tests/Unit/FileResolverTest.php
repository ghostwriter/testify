<?php 

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Generator;
use Ghostwriter\Testify\FileResolver;
use Ghostwriter\Testify\TestNamespaceResolver;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(FileResolver::class)]
final class FileResolverTest extends TestCase
{
    public static function testConstructDataProvider(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0'],
        ];
    }

    #[DataProvider('testConstructDataProvider')]
    public function testConstruct(TestNamespaceResolver $testNamespaceResolver): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public static function testResolveDataProvider(): Generator
    {
        yield from [
            'testResolve' => ['parameter-0'],
        ];
    }

    #[DataProvider('testResolveDataProvider')]
    public function testResolve(array $tokens): void
    {
        self::markTestSkipped('Not implemented yet.');
    }
}
