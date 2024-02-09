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
    public function testGenerate(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public static function testConstructDataProvider(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1'],
        ];
    }

    #[DataProvider('testConstructDataProvider')]
    public function testConstruct(string $name, string $alias): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    final public function testAlias(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public static function testCompareDataProvider(): Generator
    {
        yield from [
            'testCompare' => ['parameter-0'],
        ];
    }

    #[DataProvider('testCompareDataProvider')]
    final public function testCompare(UseGeneratorInterface $generator): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    final public function testName(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }
}
