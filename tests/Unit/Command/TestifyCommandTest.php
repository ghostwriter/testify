<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Command;

use Faker\Generator as FakerGenerator;
use Generator;
use Ghostwriter\Testify\Command\TestifyCommand;
use Ghostwriter\Testify\Filesystem;
use Ghostwriter\Testify\PhpFileFinder;
use Ghostwriter\Testify\TestBuilder;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[CoversClass(TestifyCommand::class)]
final class TestifyCommandTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderConstruct')]
    public function testConstruct(
        Filesystem $filesystem,
        TestBuilder $testBuilder,
        PhpFileFinder $phpFileFinder,
        FakerGenerator $fakerGenerator
    ): void {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderExecute')]
    public function testExecute(InputInterface $input, OutputInterface $output): void
    {
        self::assertTrue(true);
    }

    public function testNew(): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderConstruct(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }

    public static function dataProviderExecute(): Generator
    {
        yield from [
            'example' => [true],
        ];
    }
}
