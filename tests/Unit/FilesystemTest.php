<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Generator;
use Ghostwriter\Testify\Filesystem;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(Filesystem::class)]
final class FilesystemTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderBasename')]
    public function testBasename(string $path, string $suffix): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderCreateDirectory')]
    public function testCreateDirectory(string $path, int $mode, bool $recursive): void
    {
        self::assertTrue(true);
    }

    public function testCurrentWorkingDirectory(): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderExists')]
    public function testExists(string $path): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderIsFile')]
    public function testIsFile(string $path): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderIsReadable')]
    public function testIsReadable(string $path): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderMissing')]
    public function testMissing(string $path): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderParentDirectory')]
    public function testParentDirectory(string $path, int $levels): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderRead')]
    public function testRead(string $path): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderSave')]
    public function testSave(string $path, string $content): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderBasename(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderCreateDirectory(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderExists(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderIsFile(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderIsReadable(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderMissing(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderParentDirectory(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderRead(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderSave(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }
}
