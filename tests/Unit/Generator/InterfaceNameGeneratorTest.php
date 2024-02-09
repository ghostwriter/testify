<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Generator;
use Ghostwriter\Testify\Generator\InterfaceNameGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(InterfaceNameGenerator::class)]
final class InterfaceNameGeneratorTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderTestConstruct')]
    public function testConstruct(string $name): void
    {
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

    public static function dataProviderTestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0'],
        ];
    }
}
