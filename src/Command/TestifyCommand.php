<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Command;

use Composer\InstalledVersions;
use Faker\Factory;
use Faker\Generator;
use Ghostwriter\Testify\Directory;
use Ghostwriter\Testify\Filesystem;
use Ghostwriter\Testify\PhpFileFinder;
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

use function sprintf;
use function str_replace;

/** @see TestifyTest */
final class TestifyCommand extends SingleCommandApplication
{
    public function __construct(
        private readonly Filesystem $filesystem,
        private readonly TestBuilder $testBuilder,
        private readonly PhpFileFinder $phpFileFinder,
        private readonly Generator $fakerGenerator,
    ) {
        parent::__construct('Testify');

        $this->setAutoExit(false);
        //        $this->getApplication()
        //            ->setCatchExceptions(false);

        $this->setName('testify');
        $this->setDescription('Generate missing Tests.');
        $this->setVersion(InstalledVersions::getPrettyVersion('ghostwriter/testify') ?? 'UNKNOWN');
        $this->addArgument('source', InputArgument::OPTIONAL, 'The path to search for missing tests.', 'src');
        $this->addOption('dry-run', 'd', InputOption::VALUE_NONE, 'Do not write any files.');
    }

    #[Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln(sprintf(
            '%s by %s <%s>' . PHP_EOL,
            $this->fakerGenerator->word(),
            $this->fakerGenerator->name(),
            $this->fakerGenerator->email()
        ));

        /** @var bool $dryRun */
        $dryRun = $input->getOption('dry-run');

        try {
            $sourceDirectory = Directory::new($input);
        } catch (Throwable $exception) {
            $output->writeln([$exception::class, $exception->getMessage(), $exception->getTraceAsString()]);

            return self::INVALID;
        }

        $count = 0;
        $progressBar = new ProgressBar($output);
        foreach ($progressBar->iterate($this->phpFileFinder->find($sourceDirectory->path())) as $file) {
            $testFile = str_replace(['/src/', '.php'], ['/tests/Unit/', 'Test.php'], $file);

            if ($dryRun || $this->filesystem->missing($testFile)) {
                ++$count;

                $output->writeln('Generating ' . $testFile);

                $testFileContent = $this->testBuilder->build($file);

                $output->writeln(PHP_EOL . $testFileContent . PHP_EOL);

                if ($dryRun) {
                    continue;
                }

                $this->filesystem->save($testFile, $testFileContent);
            }
        }
        $output->writeln(sprintf('%sGenerated %d missing tests.', PHP_EOL . PHP_EOL, $count));

        return self::SUCCESS;
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
            Factory::create(),
        );
    }
}
