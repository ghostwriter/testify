<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Generator;
use Ghostwriter\Testify\Generator\NamespaceGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(NamespaceGenerator::class)]
final class NamespaceGeneratorTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderTestClass')]
    public function testClass(string $name, string $extends, array $methods, array $attributes, bool $isFinal): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestClassLikes')]
    public function testClassLikes(array $classLikes): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestConstruct')]
    public function testConstruct(string $name, array $uses, array $classLikes): void
    {
        self::assertTrue(true);
    }

    public function testGenerate(): void
    {
        self::assertTrue(true);
    }

    public function testName(): void
    {
        self::assertTrue(true);
    }

    public function testUses(): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestUsesClass')]
    public function testUsesClass(string $class): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestUsesConstant')]
    public function testUsesConstant(string $constant): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestUsesFunction')]
    public function testUsesFunction(string $function): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderTestClass(): Generator
    {
        yield from [
            'testClass' => ['parameter-0', 'parameter-1', 'parameter-2', 'parameter-3', 'parameter-4'],
        ];
    }

    public static function dataProviderTestClassLikes(): Generator
    {
        yield from [
            'testClassLikes' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1', 'parameter-2'],
        ];
    }

    public static function dataProviderTestUsesClass(): Generator
    {
        yield from [
            'testUsesClass' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestUsesConstant(): Generator
    {
        yield from [
            'testUsesConstant' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestUsesFunction(): Generator
    {
        yield from [
            'testUsesFunction' => ['parameter-0'],
        ];
    }
}
