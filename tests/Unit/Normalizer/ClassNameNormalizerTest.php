<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Normalizer;

use Generator;
use Ghostwriter\Testify\Normalizer\ClassNameNormalizer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(ClassNameNormalizer::class)]
final class ClassNameNormalizerTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderTestNormalize')]
    public function testNormalize(string $name): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderTestNormalize(): Generator
    {
        yield from [
            'testNormalize' => ['parameter-0'],
        ];
    }
}
