<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Generator;
use Ghostwriter\Testify\Generator\PropertyGenerator;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMemberGeneratorInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(PropertyGenerator::class)]
final class PropertyGeneratorTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderTestCompare')]
    public function testCompare(ClassLikeMemberGeneratorInterface $right): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestConstruct')]
    public function testConstruct(
        string $name,
        mixed $value,
        bool $isStatic,
        bool $isPublic,
        bool $isProtected,
        bool $isPrivate,
        bool $isReadonly
    ): void {
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

    public static function dataProviderTestCompare(): Generator
    {
        yield from [
            'testCompare' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestConstruct(): Generator
    {
        yield from [
            'testConstruct' => [
                'parameter-0',
                'parameter-1',
                'parameter-2',
                'parameter-3',
                'parameter-4',
                'parameter-5',
                'parameter-6',
            ],
        ];
    }
}
