<?php 

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Generator;
use Ghostwriter\Testify\Generator\ClassGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(ClassGenerator::class)]
final class ClassGeneratorTest extends TestCase
{
    public static function testConstructDataProvider(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1', 'parameter-2', 'parameter-3', 'parameter-4', 'parameter-5', 'parameter-6', 'parameter-7', 'parameter-8', 'parameter-9', 'parameter-10', 'parameter-11', 'parameter-12'],
        ];
    }

    #[DataProvider('testConstructDataProvider')]
    public function testConstruct(string $name, string $extends, array $attributes, array $uses, array $constants, array $dockBlocks, array $interfaces, array $methods, array $properties, array $traitUses, bool $isAbstract, bool $isFinal, bool $isReadonly): void
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
