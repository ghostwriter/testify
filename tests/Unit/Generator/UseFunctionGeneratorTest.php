<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Generator;
use Ghostwriter\Testify\Generator\UseFunctionGenerator;
use Ghostwriter\Testify\Interface\Generator\UseGeneratorInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(UseFunctionGenerator::class)]
final class UseFunctionGeneratorTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    final public function testAlias(): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestCompare')]
    final public function testCompare(UseGeneratorInterface $generator): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestConstruct')]
    public function testConstruct(string $name, string $alias): void
    {
        self::assertTrue(true);
    }

    public function testGenerate(): void
    {
        self::assertTrue(true);
    }

    final public function testName(): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderTestCompare(): Generator
    {
        yield from [
            'testCompare' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1'],
        ];
    }
}
