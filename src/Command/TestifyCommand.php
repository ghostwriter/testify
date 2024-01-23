<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Command;

use Composer\InstalledVersions;
use Ghostwriter\Testify\Filesystem;
use Ghostwriter\Testify\PhpFileFinder;
use Ghostwriter\Testify\Project;
use Ghostwriter\Testify\TestBuilder;
use Override;
use Psalm\Config;
use Psalm\Internal\Analyzer\ProjectAnalyzer;
use Psalm\Internal\IncludeCollector;
use Psalm\Internal\Provider\FileProvider;
use Psalm\Internal\Provider\Providers;
use Psalm\Progress\VoidProgress;
use Psalm\Report;
use Psalm\Report\ReportOptions;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\SingleCommandApplication;
use Throwable;

use const PHP_EOL;

use function gc_collect_cycles;
use function memory_get_usage;
use function round;
use function sprintf;
use function str_replace;
use function vsprintf;

/** @see TestifyTest */
final class TestifyCommand extends SingleCommandApplication
{
    public function __construct(
        private readonly Filesystem $filesystem,
        private readonly TestBuilder $testBuilder,
        private readonly PhpFileFinder $phpFileFinder,
    ) {
        parent::__construct('Testify');

        $this->setAutoExit(false);

        $this->setName('testify');
        $this->setDescription('Generate missing Tests.');
        $this->setVersion(InstalledVersions::getPrettyVersion('ghostwriter/testify') ?? 'UNKNOWN');
        $this->addArgument('source', InputArgument::OPTIONAL, 'The path to search for missing tests.', 'src');
        $this->addArgument('tests', InputArgument::OPTIONAL, 'The path used to create tests.', 'tests');
        $this->addOption('dry-run', 'd', InputOption::VALUE_NONE, 'Do not write any files.');
    }

    #[Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln(sprintf(
            '<info>%s</info> by <info>%s</info> (<comment>%s</comment>) and contributors. %s' . PHP_EOL,
            'Testify',
            'Nathanael Esayeas',
            'https://ghostwriter.github.io',
            '<error>#BlackLivesMatter</error>'
        ));

        try {
            $project = Project::new($input);
        } catch (Throwable $exception) {
            $output->writeln([$exception::class, $exception->getMessage(), $exception->getTraceAsString()]);

            return self::INVALID;
        }

        $count = 0;
        $dryRun = $project->dryRun;
        $sourceDirectory = $project->source;
        $testsDirectory = $project->tests;

        $progressBar = new ProgressBar($output);
        foreach ($progressBar->iterate($this->phpFileFinder->find($sourceDirectory)) as $file) {
            gc_collect_cycles();

            $testFile = str_replace([$sourceDirectory, '.php'], [$testsDirectory, 'Test.php'], $file);

            if ($dryRun || $this->filesystem->missing($testFile)) {
                ++$count;

                $output->writeln([
                    PHP_EOL,
                    'Class <comment>' . $file . '</comment> is missing a test.',
                    'Generating <info>' . $testFile . '</info>.',
                    self::memoryUsage(),
                    PHP_EOL,
                ]);

                $testFileContent = $this->testBuilder->build($file, $testsDirectory);

                $output->writeln(PHP_EOL . $testFileContent . PHP_EOL);

                if ($dryRun) {
                    $output->writeln('<info>Dry run, not writing file.</info>');
                    continue;
                }

                $this->filesystem->save($testFile, $testFileContent);
            }
        }

        $output->writeln(
            sprintf('%s<comment>Found <info>%d</info> missing tests.</comment>', PHP_EOL . PHP_EOL, $count)
        );

        return self::SUCCESS;
    }

    public static function memoryUsage(): string
    {
        $memoryUsage = memory_get_usage(true);

        return vsprintf('<info>%s</info> %s used', match (true) {
            $memoryUsage < 1024 => [$memoryUsage, 'bytes'],
            $memoryUsage < 1048576 => [round($memoryUsage / 1024, 2), 'KiB'],
            $memoryUsage < 1073741824 => [round($memoryUsage / 1048576, 2), 'MiB'],
            $memoryUsage < 1099511627776 => [round($memoryUsage / 1073741824, 2), 'GiB'],
            $memoryUsage < 1125899906842624 => [round($memoryUsage / 1099511627776, 2), 'TiB'],
        });
    }

    public static function new(): self
    {
        $filesystem = new Filesystem();

        $currentWorkingDirectory = $filesystem->currentWorkingDirectory();

        $config = Config::loadFromXML($currentWorkingDirectory, '<psalm/>');
        $config->cache_directory = null;
        $config->setIncludeCollector(new IncludeCollector());
        //        $config->addPluginClass('Ghostwriter\Testify\PsalmPlugin');
        //        $config->addPluginPath($currentWorkingDirectory . '/vendor/ghostwriter/psalm-plugin/src/Plugin.php');

        $stdout_report_options = new ReportOptions();
        $stdout_report_options->show_suggestions = false;
        $stdout_report_options->format = Report::TYPE_JSON;

        return new self(
            $filesystem,
            new TestBuilder(new ProjectAnalyzer(
                $config,
                new Providers(new FileProvider()),
                $stdout_report_options,
                [],
                1,
                new VoidProgress(),
            )),
            new PhpFileFinder(),
        );
    }
}
