<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Generator;
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

    #[DataProvider('dataProviderFind')]
    public function testFind(string $path, Closure $match, Closure $skip): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderFind(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }
}
