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
    public static function testConstructDataProvider(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1', 'parameter-2'],
        ];
    }

    #[DataProvider('testConstructDataProvider')]
    public function testConstruct(string $name, array $uses, array $classLikes): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public static function testClassDataProvider(): Generator
    {
        yield from [
            'testClass' => ['parameter-0', 'parameter-1', 'parameter-2', 'parameter-3', 'parameter-4'],
        ];
    }

    #[DataProvider('testClassDataProvider')]
    public function testClass(string $name, string $extends, array $methods, array $attributes, bool $isFinal): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public static function testClassLikesDataProvider(): Generator
    {
        yield from [
            'testClassLikes' => ['parameter-0'],
        ];
    }

    #[DataProvider('testClassLikesDataProvider')]
    public function testClassLikes(array $classLikes): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public function testGenerate(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public function testName(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public function testUses(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public static function testUsesClassDataProvider(): Generator
    {
        yield from [
            'testUsesClass' => ['parameter-0'],
        ];
    }

    #[DataProvider('testUsesClassDataProvider')]
    public function testUsesClass(string $class): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public static function testUsesConstantDataProvider(): Generator
    {
        yield from [
            'testUsesConstant' => ['parameter-0'],
        ];
    }

    #[DataProvider('testUsesConstantDataProvider')]
    public function testUsesConstant(string $constant): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public static function testUsesFunctionDataProvider(): Generator
    {
        yield from [
            'testUsesFunction' => ['parameter-0'],
        ];
    }

    #[DataProvider('testUsesFunctionDataProvider')]
    public function testUsesFunction(string $function): void
    {
        self::markTestSkipped('Not implemented yet.');
    }
}
