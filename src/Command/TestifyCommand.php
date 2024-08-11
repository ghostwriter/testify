<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Command;

use Ghostwriter\Container\Attribute\Inject;
use Ghostwriter\Testify\Filesystem;
use Ghostwriter\Testify\Interface\CommandInterface;
use Ghostwriter\Testify\Interface\PrinterInterface;
use Ghostwriter\Testify\Interface\RunnerInterface;
use Ghostwriter\Testify\Printer;
use Ghostwriter\Testify\Project;
use Ghostwriter\Testify\Runner;
use Ghostwriter\Testify\TestBuilder;
use Override;
use Throwable;

use const PHP_EOL;
use const STDOUT;

use function array_key_exists;
use function array_slice;
use function fwrite;
use function getopt;
use function in_array;
use function sprintf;

final readonly class TestifyCommand implements CommandInterface
{
    /**
     * @throws Throwable
     */
    public function __construct(
        private Filesystem $filesystem,
        #[Inject(Runner::class)]
        private RunnerInterface $runner,
        #[Inject(Printer::class)]
        private PrinterInterface $printer,
        private TestBuilder $testBuilder,
    ) {
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function execute(): int
    {
        global $argv;
        //        $short_opts = "df";
        //        $long_opts = [
        //            'source' => 'The path to search for missing tests.',
        //            'tests' => 'The path used to create tests.',
        //            'dry-run' => 'Whether to write the files or not',
        //            'force' => 'Whether to overwrite existing files',
        //        ];

        //        $app->setDescription('Generate missing Tests.');
        //        $app->setName('Testify');
        //        $app->setVersion(InstalledVersions::getPrettyVersion('ghostwriter/testify') ?? 'UNKNOWN');

        $rest_index = 0;
        $opts = getopt('df', ['dry-run', 'force'], $rest_index);
        $options = array_slice($argv, $rest_index);

        $dryRun = (
            array_key_exists('d', $opts)
            || array_key_exists('dry-run', $opts)
            || in_array('-d', $options, true)
            || in_array('--dry-run', $options, true)
        );

        $force = (
            array_key_exists('f', $opts)
            || array_key_exists('force', $opts)
            || in_array('-f', $options, true)
            || in_array('--force', $options, true)
        );

        $project = new Project($options[0] ?? 'src', $options[1] ?? 'tests', $dryRun, $force);

        fwrite(STDOUT, sprintf(
            '%s by %s and contributors. %s' . PHP_EOL,
            'Testify',
            'Nathanael Esayeas',
            '#BlackLivesMatter'
        ));

        //        try {
        //            $project = Project::new($input);
        //        } catch (Throwable $throwable) {
        //            $output->writeln(
        //                sprintf(
        //                    '<error>%s: %s</error>' . PHP_EOL . PHP_EOL . '%s',
        //                    $throwable::class,
        //                    $throwable->getMessage(),
        //                    $throwable->getTraceAsString()
        //                )
        //            );
        //
        //            return Command::INVALID;
        //        }
        //        dd($options, $opts, $project);

        $count = 0;
        $dryRun = $project->dryRun;
        $force = $project->force;
        foreach ($this->runner->run($project) as $file => $testFile) {
            $this->writeln(['Class ' . $file . ' is missing a test.', 'Generating ' . $testFile . '.', PHP_EOL]);

            $fileGenerator = $this->testBuilder->build($file, $testFile);

            $testFileContent = $this->printer->print($fileGenerator);

            $this->writeln(['------', PHP_EOL . $testFileContent . PHP_EOL]);

            if ($dryRun) {
                $this->writeln('Dry run, not writing file.');
                continue;
            }

            if ($force || $this->filesystem->missing($testFile)) {
                ++$count;
                $this->filesystem->save($testFile, $testFileContent);

                $this->writeln(sprintf('File "%s" written.' . PHP_EOL, $testFile));
                continue;
            }

            $this->writeln('File already exists;(use "--force|-f" to overwrite)' . PHP_EOL);
        }

        $this->writeln([PHP_EOL, sprintf('Generated %d missing tests.', $count)]);

        return 0;
    }

    private function writeln(array|string $message): void
    {
        foreach ((array) $message as $line) {
            fwrite(STDOUT, $line . PHP_EOL);
        }
    }
}
