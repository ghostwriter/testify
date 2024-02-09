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

    public static function dataProviderTestNew(): Generator
    {
        yield from [
            'testNew' => ['parameter-0'],
        ];
    }

    #[DataProvider('dataProviderTestNew')]
    public static function testNew(InputInterface $input): void
    {
        self::assertTrue(true);
    }
}
