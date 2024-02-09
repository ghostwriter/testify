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
    public static function testConstructDataProvider(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0'],
        ];
    }

    #[DataProvider('testConstructDataProvider')]
    public function testConstruct(array $namespaces): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public function testDeclareStrictTypes(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public function testGenerate(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public static function testNewDataProvider(): Generator
    {
        yield from [
            'testNew' => ['parameter-0'],
        ];
    }

    #[DataProvider('testNewDataProvider')]
    public static function testNew(array $namespaces): void
    {
        self::markTestSkipped('Not implemented yet.');
    }
}
