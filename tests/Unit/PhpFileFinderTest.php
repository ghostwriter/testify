<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Generator;
use Ghostwriter\Testify\Filesystem;
use Ghostwriter\Testify\PhpFileFinder;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(PhpFileFinder::class)]
final class PhpFileFinderTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderTestConstruct')]
    public function testConstruct(Filesystem $filesystem): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestFind')]
    public function testFind(string $directory): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderTestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestFind(): Generator
    {
        yield from [
            'testFind' => ['parameter-0'],
        ];
    }
}
