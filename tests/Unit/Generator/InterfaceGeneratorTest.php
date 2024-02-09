<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Generator;
use Ghostwriter\Testify\Generator\InterfaceGenerator;
use Ghostwriter\Testify\Interface\Generator\ClassLikeGeneratorInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(InterfaceGenerator::class)]
final class InterfaceGeneratorTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProvidertestAddMethod')]
    public function testAddMethod(GeneratorInterface $method): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestCompare')]
    public function testCompare(ClassLikeGeneratorInterface $other): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestConstruct')]
    public function testConstruct(string $name, array $uses, array $extends, array $constants, array $methods): void
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

    public static function dataProvidertestAddMethod(): Generator
    {
        yield from [
            'testAddMethod' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestCompare(): Generator
    {
        yield from [
            'testCompare' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1', 'parameter-2', 'parameter-3', 'parameter-4'],
        ];
    }
}
