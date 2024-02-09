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
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderTestResolve')]
    public function testResolve(string $namespace): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderTestResolve(): Generator
    {
        yield from [
            'testResolve' => ['parameter-0'],
        ];
    }
}
