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

    #[DataProvider('dataProvidertestClass')]
    public function testClass(string $name, string $extends, array $methods, array $attributes, bool $isFinal): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestClassLikes')]
    public function testClassLikes(array $classLikes): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestConstruct')]
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

    #[DataProvider('dataProvidertestUsesClass')]
    public function testUsesClass(string $class): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestUsesConstant')]
    public function testUsesConstant(string $constant): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestUsesFunction')]
    public function testUsesFunction(string $function): void
    {
        self::assertTrue(true);
    }

    public static function dataProvidertestClass(): Generator
    {
        yield from [
            'testClass' => ['parameter-0', 'parameter-1', 'parameter-2', 'parameter-3', 'parameter-4'],
        ];
    }

    public static function dataProvidertestClassLikes(): Generator
    {
        yield from [
            'testClassLikes' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1', 'parameter-2'],
        ];
    }

    public static function dataProvidertestUsesClass(): Generator
    {
        yield from [
            'testUsesClass' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestUsesConstant(): Generator
    {
        yield from [
            'testUsesConstant' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestUsesFunction(): Generator
    {
        yield from [
            'testUsesFunction' => ['parameter-0'],
        ];
    }
}
