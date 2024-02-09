<?php 

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Generator;
use Ghostwriter\Testify\Generator\InterfaceGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(InterfaceGenerator::class)]
final class InterfaceGeneratorTest extends TestCase
{
    public static function testConstructDataProvider(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1', 'parameter-2', 'parameter-3', 'parameter-4'],
        ];
    }

    #[DataProvider('testConstructDataProvider')]
    public function testConstruct(string $name, array $uses, array $extends, array $constants, array $methods): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public static function testAddMethodDataProvider(): Generator
    {
        yield from [
            'testAddMethod' => ['parameter-0'],
        ];
    }

    #[DataProvider('testAddMethodDataProvider')]
    public function testAddMethod(GeneratorInterface $method): void
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
}
