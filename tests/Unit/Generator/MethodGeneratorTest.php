<?php 

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Generator;
use Ghostwriter\Testify\Generator\MethodGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(MethodGenerator::class)]
final class MethodGeneratorTest extends TestCase
{
    public static function testConstructDataProvider(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1', 'parameter-2', 'parameter-3', 'parameter-4', 'parameter-5', 'parameter-6', 'parameter-7', 'parameter-8', 'parameter-9', 'parameter-10', 'parameter-11', 'parameter-12'],
        ];
    }

    #[DataProvider('testConstructDataProvider')]
    public function testConstruct(string $name, string $returnType, array $uses, array $parameters, array $body, array $attributes, bool $isStatic, bool $isFinal, bool $isAbstract, bool $isPublic, bool $isProtected, bool $isPrivate, bool $isAnonymous): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public function testGenerate(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public function testUses(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }
}
