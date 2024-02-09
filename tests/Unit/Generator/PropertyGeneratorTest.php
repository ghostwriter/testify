<?php 

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Generator;
use Ghostwriter\Testify\Generator\PropertyGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(PropertyGenerator::class)]
final class PropertyGeneratorTest extends TestCase
{
    public static function testConstructDataProvider(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1', 'parameter-2', 'parameter-3', 'parameter-4', 'parameter-5', 'parameter-6'],
        ];
    }

    #[DataProvider('testConstructDataProvider')]
    public function testConstruct(string $name, mixed $value, bool $isStatic, bool $isPublic, bool $isProtected, bool $isPrivate, bool $isReadonly): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public function testGenerate(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }
}
