<?php 

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Generator;
use Ghostwriter\Testify\Generator\StaticCallGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(StaticCallGenerator::class)]
final class StaticCallGeneratorTest extends TestCase
{
    public static function testConstructDataProvider(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1', 'parameter-2'],
        ];
    }

    #[DataProvider('testConstructDataProvider')]
    public function testConstruct(string $class, string $method, array $args): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public function testGenerate(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }
}
