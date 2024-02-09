<?php 

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Generator;
use Ghostwriter\Testify\Generator\TestDataProviderGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestDataProviderGenerator::class)]
final class TestDataProviderGeneratorTest extends TestCase
{
    public static function testConstructDataProvider(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1'],
        ];
    }

    #[DataProvider('testConstructDataProvider')]
    public function testConstruct(string $name, array $parameters): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public function testGenerate(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }
}
