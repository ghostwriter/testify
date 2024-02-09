<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Generator;
use Ghostwriter\Testify\Generator\AttributeGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(AttributeGenerator::class)]
final class AttributeGeneratorTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProvidertestConstruct')]
    public function testConstruct(string $name, array $params): void
    {
        self::assertTrue(true);
    }

    public function testGenerate(): void
    {
        self::assertTrue(true);
    }

    public static function dataProvidertestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1'],
        ];
    }
}
