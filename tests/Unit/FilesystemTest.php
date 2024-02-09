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

    #[DataProvider('dataProviderTestBasename')]
    public function testBasename(string $path, string $suffix): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestCreateDirectory')]
    public function testCreateDirectory(string $path, int $mode, bool $recursive): void
    {
        self::assertTrue(true);
    }

    public function testCurrentWorkingDirectory(): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestExists')]
    public function testExists(string $path): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestIsFile')]
    public function testIsFile(string $path): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestIsReadable')]
    public function testIsReadable(string $path): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestMissing')]
    public function testMissing(string $path): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestParentDirectory')]
    public function testParentDirectory(string $path, int $levels): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestRead')]
    public function testRead(string $path): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestRecursiveDirectoryIterator')]
    public function testRecursiveDirectoryIterator(string $directory): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestSave')]
    public function testSave(string $path, string $content): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderTestBasename(): Generator
    {
        yield from [
            'testBasename' => ['parameter-0', 'parameter-1'],
        ];
    }

    public static function dataProviderTestCreateDirectory(): Generator
    {
        yield from [
            'testCreateDirectory' => ['parameter-0', 'parameter-1', 'parameter-2'],
        ];
    }

    public static function dataProviderTestExists(): Generator
    {
        yield from [
            'testExists' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestIsFile(): Generator
    {
        yield from [
            'testIsFile' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestIsReadable(): Generator
    {
        yield from [
            'testIsReadable' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestMissing(): Generator
    {
        yield from [
            'testMissing' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestParentDirectory(): Generator
    {
        yield from [
            'testParentDirectory' => ['parameter-0', 'parameter-1'],
        ];
    }

    public static function dataProviderTestRead(): Generator
    {
        yield from [
            'testRead' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestRecursiveDirectoryIterator(): Generator
    {
        yield from [
            'testRecursiveDirectoryIterator' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestSave(): Generator
    {
        yield from [
            'testSave' => ['parameter-0', 'parameter-1'],
        ];
    }
}
