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
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderTestConstruct')]
    public function testConstruct(TestNamespaceResolver $testNamespaceResolver): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestResolve')]
    public function testResolve(array $tokens): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderTestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestResolve(): Generator
    {
        yield from [
            'testResolve' => ['parameter-0'],
        ];
    }
}
