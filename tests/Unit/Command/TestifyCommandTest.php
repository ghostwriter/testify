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

    #[DataProvider('dataProvidertestAddArgument')]
    public function testAddArgument(
        string $name,
        int $mode,
        string $description,
        mixed $default,
        array|Closure $suggestedValues
    ): void {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestAddOption')]
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

    #[DataProvider('dataProvidertestAddUsage')]
    public function testAddUsage(string $usage): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestComplete')]
    public function testComplete(CompletionInput $input, CompletionSuggestions $suggestions): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestConstruct')]
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

    #[DataProvider('dataProvidertestGetHelper')]
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

    #[DataProvider('dataProvidertestGetSynopsis')]
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

    #[DataProvider('dataProvidertestMergeApplicationDefinition')]
    public function testMergeApplicationDefinition(bool $mergeArgs): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestRun')]
    public function testRun(InputInterface $input, OutputInterface $output): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestSetAliases')]
    public function testSetAliases(iterable $aliases): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestSetApplication')]
    public function testSetApplication(Application $application): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestSetAutoExit')]
    public function testSetAutoExit(bool $autoExit): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestSetCode')]
    public function testSetCode(callable $code): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestSetDefinition')]
    public function testSetDefinition(array|InputDefinition $definition): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestSetDescription')]
    public function testSetDescription(string $description): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestSetHelp')]
    public function testSetHelp(string $help): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestSetHelperSet')]
    public function testSetHelperSet(HelperSet $helperSet): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestSetHidden')]
    public function testSetHidden(bool $hidden): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestSetName')]
    public function testSetName(string $name): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestSetProcessTitle')]
    public function testSetProcessTitle(string $title): void
    {
        self::assertTrue(true);
    }

    #[DataProvider('dataProvidertestSetVersion')]
    public function testSetVersion(string $version): void
    {
        self::assertTrue(true);
    }

    public static function dataProvidertestAddArgument(): Generator
    {
        yield from [
            'testAddArgument' => ['parameter-0', 'parameter-1', 'parameter-2', 'parameter-3', 'parameter-4'],
        ];
    }

    public static function dataProvidertestAddOption(): Generator
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

    public static function dataProvidertestAddUsage(): Generator
    {
        yield from [
            'testAddUsage' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestComplete(): Generator
    {
        yield from [
            'testComplete' => ['parameter-0', 'parameter-1'],
        ];
    }

    public static function dataProvidertestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1', 'parameter-2', 'parameter-3'],
        ];
    }

    public static function dataProvidertestGetHelper(): Generator
    {
        yield from [
            'testGetHelper' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestGetSynopsis(): Generator
    {
        yield from [
            'testGetSynopsis' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestMergeApplicationDefinition(): Generator
    {
        yield from [
            'testMergeApplicationDefinition' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestRun(): Generator
    {
        yield from [
            'testRun' => ['parameter-0', 'parameter-1'],
        ];
    }

    public static function dataProvidertestSetAliases(): Generator
    {
        yield from [
            'testSetAliases' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestSetApplication(): Generator
    {
        yield from [
            'testSetApplication' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestSetAutoExit(): Generator
    {
        yield from [
            'testSetAutoExit' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestSetCode(): Generator
    {
        yield from [
            'testSetCode' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestSetDefinition(): Generator
    {
        yield from [
            'testSetDefinition' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestSetDescription(): Generator
    {
        yield from [
            'testSetDescription' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestSetHelp(): Generator
    {
        yield from [
            'testSetHelp' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestSetHelperSet(): Generator
    {
        yield from [
            'testSetHelperSet' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestSetHidden(): Generator
    {
        yield from [
            'testSetHidden' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestSetName(): Generator
    {
        yield from [
            'testSetName' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestSetProcessTitle(): Generator
    {
        yield from [
            'testSetProcessTitle' => ['parameter-0'],
        ];
    }

    public static function dataProvidertestSetVersion(): Generator
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
