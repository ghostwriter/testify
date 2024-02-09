<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Generator;
use Ghostwriter\Testify\Generator\TestMethodGenerator;
use Ghostwriter\Testify\Normalizer\TestMethodNameNormalizer;
use PhpParser\BuilderFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestMethodGenerator::class)]
final class TestMethodGeneratorTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderTestConstruct')]
    public function testConstruct(
        BuilderFactory $builderFactory,
        TestMethodNameNormalizer $testMethodNameNormalizer
    ): void {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestInvoke')]
    public function testInvoke(
        string $className,
        string $methodName,
        bool $isStatic,
        bool $isFinal,
        bool $isAbstract,
        bool $isPublic,
        bool $isProtected,
        bool $isPrivate,
        array $params,
        mixed $returnType
    ): void {
        self::assertTrue(true);
    }

    public static function dataProviderTestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1'],
        ];
    }

    public static function dataProviderTestInvoke(): Generator
    {
        yield from [
            'testInvoke' => [
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
            ],
        ];
    }
}
