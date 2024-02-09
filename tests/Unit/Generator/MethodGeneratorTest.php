<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Generator;
use Ghostwriter\Testify\Generator\MethodGenerator;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMemberGeneratorInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(MethodGenerator::class)]
final class MethodGeneratorTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProvidertestCompare')]
    public function testCompare(ClassLikeMemberGeneratorInterface $right): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestConstruct')]
    public function testConstruct(
        string $name,
        string $returnType,
        array $uses,
        array $parameters,
        array $body,
        array $attributes,
        bool $isStatic,
        bool $isFinal,
        bool $isAbstract,
        bool $isPublic,
        bool $isProtected,
        bool $isPrivate,
        bool $isAnonymous
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

    public function testUses(): void
    {
        self::assertTrue(true);
    }

    public static function dataProvidertestCompare(): Generator
    {
        yield from [
            'testCompare' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestConstruct(): Generator
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
                'parameter-7',
                'parameter-8',
                'parameter-9',
                'parameter-10',
                'parameter-11',
                'parameter-12',
            ],
        ];
    }
}
