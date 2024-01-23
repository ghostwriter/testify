<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Generator;
use Ghostwriter\Testify\Directory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Input\InputInterface;

#[CoversClass(Directory::class)]
final class DirectoryTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderConstruct')]
    public function testConstruct(string $path): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderNew')]
    public function testNew(InputInterface $input): void
    {
        self::assertTrue(true);
    }

    public function testPath(): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderConstruct(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderNew(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }
}
