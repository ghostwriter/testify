<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Command;

use Generator;
use Ghostwriter\Testify\Command\TestifyCommand;
use Ghostwriter\Testify\Filesystem;
use Ghostwriter\Testify\Interface\PrinterInterface;
use Ghostwriter\Testify\Interface\RunnerInterface;
use Ghostwriter\Testify\TestBuilder;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Completion\CompletionInput;
use Symfony\Component\Console\Completion\CompletionSuggestions;
use Symfony\Component\Console\Helper\HelperSet;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[CoversClass(TestifyCommand::class)]
final class TestifyCommandTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderTestAddArgument')]
    public function testAddArgument(
        string $name,
        int $mode,
        string $description,
        mixed $default,
        array|Closure $suggestedValues
    ): void {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestAddOption')]
    public function testAddOption(
        string $name,
        null|array|string $shortcut,
        int $mode,
        string $description,
        mixed $default,
        array|Closure $suggestedValues
    ): void {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestAddUsage')]
    public function testAddUsage(string $usage): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestComplete')]
    public function testComplete(CompletionInput $input, CompletionSuggestions $suggestions): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestConstruct')]
    public function testConstruct(
        Filesystem $filesystem,
        RunnerInterface $runner,
        PrinterInterface $printer,
        TestBuilder $testBuilder
    ): void {
        self::assertTrue(true);
    }

    public function testGetAliases(): void
    {
        self::assertTrue(true);
    }

    public function testGetApplication(): void
    {
        self::assertTrue(true);
    }

    public function testGetDefinition(): void
    {
        self::assertTrue(true);
    }

    public function testGetDescription(): void
    {
        self::assertTrue(true);
    }

    public function testGetHelp(): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestGetHelper')]
    public function testGetHelper(string $name): void
    {
        self::assertTrue(true);
    }

    public function testGetHelperSet(): void
    {
        self::assertTrue(true);
    }

    public function testGetName(): void
    {
        self::assertTrue(true);
    }

    public function testGetNativeDefinition(): void
    {
        self::assertTrue(true);
    }

    public function testGetProcessedHelp(): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestGetSynopsis')]
    public function testGetSynopsis(bool $short): void
    {
        self::assertTrue(true);
    }

    public function testGetUsages(): void
    {
        self::assertTrue(true);
    }

    public function testIgnoreValidationErrors(): void
    {
        self::assertTrue(true);
    }

    public function testIsEnabled(): void
    {
        self::assertTrue(true);
    }

    public function testIsHidden(): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestMergeApplicationDefinition')]
    public function testMergeApplicationDefinition(bool $mergeArgs): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestRun')]
    public function testRun(InputInterface $input, OutputInterface $output): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestSetAliases')]
    public function testSetAliases(iterable $aliases): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestSetApplication')]
    public function testSetApplication(Application $application): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestSetAutoExit')]
    public function testSetAutoExit(bool $autoExit): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestSetCode')]
    public function testSetCode(callable $code): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestSetDefinition')]
    public function testSetDefinition(array|InputDefinition $definition): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestSetDescription')]
    public function testSetDescription(string $description): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestSetHelp')]
    public function testSetHelp(string $help): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestSetHelperSet')]
    public function testSetHelperSet(HelperSet $helperSet): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestSetHidden')]
    public function testSetHidden(bool $hidden): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestSetName')]
    public function testSetName(string $name): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestSetProcessTitle')]
    public function testSetProcessTitle(string $title): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProviderTestSetVersion')]
    public function testSetVersion(string $version): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderTestAddArgument(): Generator
    {
        yield from [
            'testAddArgument' => ['parameter-0', 'parameter-1', 'parameter-2', 'parameter-3', 'parameter-4'],
        ];
    }

    public static function dataProviderTestAddOption(): Generator
    {
        yield from [
            'testAddOption' => [
                'parameter-0',
                'parameter-1',
                'parameter-2',
                'parameter-3',
                'parameter-4',
                'parameter-5',
            ],
        ];
    }

    public static function dataProviderTestAddUsage(): Generator
    {
        yield from [
            'testAddUsage' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestComplete(): Generator
    {
        yield from [
            'testComplete' => ['parameter-0', 'parameter-1'],
        ];
    }

    public static function dataProviderTestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1', 'parameter-2', 'parameter-3'],
        ];
    }

    public static function dataProviderTestGetHelper(): Generator
    {
        yield from [
            'testGetHelper' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestGetSynopsis(): Generator
    {
        yield from [
            'testGetSynopsis' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestMergeApplicationDefinition(): Generator
    {
        yield from [
            'testMergeApplicationDefinition' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestRun(): Generator
    {
        yield from [
            'testRun' => ['parameter-0', 'parameter-1'],
        ];
    }

    public static function dataProviderTestSetAliases(): Generator
    {
        yield from [
            'testSetAliases' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestSetApplication(): Generator
    {
        yield from [
            'testSetApplication' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestSetAutoExit(): Generator
    {
        yield from [
            'testSetAutoExit' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestSetCode(): Generator
    {
        yield from [
            'testSetCode' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestSetDefinition(): Generator
    {
        yield from [
            'testSetDefinition' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestSetDescription(): Generator
    {
        yield from [
            'testSetDescription' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestSetHelp(): Generator
    {
        yield from [
            'testSetHelp' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestSetHelperSet(): Generator
    {
        yield from [
            'testSetHelperSet' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestSetHidden(): Generator
    {
        yield from [
            'testSetHidden' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestSetName(): Generator
    {
        yield from [
            'testSetName' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestSetProcessTitle(): Generator
    {
        yield from [
            'testSetProcessTitle' => ['parameter-0'],
        ];
    }

    public static function dataProviderTestSetVersion(): Generator
    {
        yield from [
            'testSetVersion' => ['parameter-0'],
        ];
    }

    public static function testGetDefaultDescription(): void
    {
        self::assertTrue(true);
    }

    public static function testGetDefaultName(): void
    {
        self::assertTrue(true);
    }
}
