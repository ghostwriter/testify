<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Generator;
use Ghostwriter\Testify\Project;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Input\InputInterface;

#[CoversClass(Project::class)]
final class ProjectTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderConstruct')]
    public function testConstruct(string $source, string $tests, bool $dryRun): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderNew')]
    public function testNew(InputInterface $input): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderConstruct(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderNew(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }
}
