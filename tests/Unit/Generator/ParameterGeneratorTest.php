<?php 

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Generator;
use Ghostwriter\Testify\Generator\ParameterGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(ParameterGenerator::class)]
final class ParameterGeneratorTest extends TestCase
{
    public static function testConstructDataProvider(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1', 'parameter-2', 'parameter-3', 'parameter-4', 'parameter-5', 'parameter-6', 'parameter-7', 'parameter-8'],
        ];
    }

    #[DataProvider('testConstructDataProvider')]
    public function testConstruct(string $name, string $type, bool $isOptional, bool $isVariadic, bool $isPassedByReference, bool $isDefaultValueAvailable, string $defaultValue, array $attributes, array $uses): void
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
