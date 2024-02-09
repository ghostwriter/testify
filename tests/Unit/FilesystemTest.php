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

    #[DataProvider('dataProvidertestBasename')]
    public function testBasename(string $path, string $suffix): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestCreateDirectory')]
    public function testCreateDirectory(string $path, int $mode, bool $recursive): void
    {
        self::assertTrue(true);
    }

    public function testCurrentWorkingDirectory(): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestExists')]
    public function testExists(string $path): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestIsFile')]
    public function testIsFile(string $path): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestIsReadable')]
    public function testIsReadable(string $path): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestMissing')]
    public function testMissing(string $path): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestParentDirectory')]
    public function testParentDirectory(string $path, int $levels): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestRead')]
    public function testRead(string $path): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestRecursiveDirectoryIterator')]
    public function testRecursiveDirectoryIterator(string $directory): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestSave')]
    public function testSave(string $path, string $content): void
    {
        self::assertTrue(true);
    }

    public static function dataProvidertestBasename(): Generator
    {
        yield from [
            'testBasename' => ['parameter-0', 'parameter-1'],
        ];
    }

    public static function dataProvidertestCreateDirectory(): Generator
    {
        yield from [
            'testCreateDirectory' => ['parameter-0', 'parameter-1', 'parameter-2'],
        ];
    }

    public static function dataProvidertestExists(): Generator
    {
        yield from [
            'testExists' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestIsFile(): Generator
    {
        yield from [
            'testIsFile' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestIsReadable(): Generator
    {
        yield from [
            'testIsReadable' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestMissing(): Generator
    {
        yield from [
            'testMissing' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestParentDirectory(): Generator
    {
        yield from [
            'testParentDirectory' => ['parameter-0', 'parameter-1'],
        ];
    }

    public static function dataProvidertestRead(): Generator
    {
        yield from [
            'testRead' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestRecursiveDirectoryIterator(): Generator
    {
        yield from [
            'testRecursiveDirectoryIterator' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestSave(): Generator
    {
        yield from [
            'testSave' => ['parameter-0', 'parameter-1'],
        ];
    }
}
