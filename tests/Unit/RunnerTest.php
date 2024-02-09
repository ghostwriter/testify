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
    public static function testConstructDataProvider(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1'],
        ];
    }

    #[DataProvider('testConstructDataProvider')]
    public function testConstruct(ProgressBar $progressBar, PhpFileFinder $phpFileFinder): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public static function testRunDataProvider(): Generator
    {
        yield from [
            'testRun' => ['parameter-0'],
        ];
    }

    #[DataProvider('testRunDataProvider')]
    public function testRun(ProjectInterface $project): void
    {
        self::markTestSkipped('Not implemented yet.');
    }
}
