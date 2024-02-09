<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Generator;
use Ghostwriter\Testify\Interface\ProjectInterface;
use Ghostwriter\Testify\PhpFileFinder;
use Ghostwriter\Testify\Runner;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Helper\ProgressBar;

#[CoversClass(Runner::class)]
final class RunnerTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderTestConstruct')]
    public function testConstruct(ProgressBar $progressBar, PhpFileFinder $phpFileFinder): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestRun')]
    public function testRun(ProjectInterface $project): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderTestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1'],
        ];
    }

    public static function dataProviderTestRun(): Generator
    {
        yield from [
            'testRun' => ['parameter-0'],
        ];
    }
}
