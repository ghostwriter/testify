<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Generator;
use Ghostwriter\Testify\Generator\FileGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(FileGenerator::class)]
final class FileGeneratorTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderTestConstruct')]
    public function testConstruct(array $namespaces): void
    {
        self::assertTrue(true);
    }

    public function testDeclareStrictTypes(): void
    {
        self::assertTrue(true);
    }

    public function testGenerate(): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderTestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestNew(): Generator
    {
        yield from [
            'testNew' => ['parameter-0'],
        ];
    }

    #[DataProvider('dataProviderTestNew')]
    public static function testNew(array $namespaces): void
    {
        self::assertTrue(true);
    }
}
