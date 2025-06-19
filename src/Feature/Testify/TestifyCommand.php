<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Feature\Testify;

use Ghostwriter\Filesystem\Interface\FilesystemInterface;
use Ghostwriter\Testify\Builder\TestBuilderInterface;
use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\Runner\RunnerInterface;
use Ghostwriter\Testify\Value\WorkspaceInterface;
use Override;
use Throwable;

use const PHP_EOL;
use const STDOUT;

use function fwrite;
use function sprintf;

final readonly class TestifyCommand implements CommandInterface
{
    /**
     * @throws Throwable
     */
    public function __construct(
        private FilesystemInterface $filesystem,
        private RunnerInterface $runner,
        private TestBuilderInterface $testBuilder,
        private WorkspaceInterface $workspace,
    ) {}

    /**
     * @throws Throwable
     */
    #[Override]
    public function execute(
        //        ArgumentListInterface $argumentList,
        //        OptionListInterface $optionList,
    ): int {

        $project = $this->workspace;
        //            new Workspace($options[0] ?? 'src', $options[1] ?? 'tests', $dryRun, $force);

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
        //                $count = 0;
        //                $dryRun = $project->dryRun;
        //                $force = $project->force;
        //                foreach ($this->runner->run($project) as $file => $testFile) {
        //                    $output->writeln([
        //                        'ClassLike <comment>' . $file . '</comment> is missing a test.',
        //                        'Generating <info>' . $testFile . '</info>.',
        //                        PHP_EOL,
        //                    ], OutputInterface::VERBOSITY_VERBOSE);

        $count = 0;
        $dryRun = $project->dryRun();
        $force = $project->force();

        foreach ($this->runner->run($project) as $file => $testFile) {
            $this->writeln(['Class ' . $file . ' is missing a test.', 'Generating ' . $testFile . '.', PHP_EOL]);

            $fileGenerator = $this->testBuilder->build($file, $testFile);

            $testFileContent = $fileGenerator->generate();

            $this->writeln(['------', PHP_EOL . $testFileContent . PHP_EOL]);

            if ($dryRun) {
                $this->writeln('Dry run, not writing file.');

                continue;
            }

            if ($force || $this->filesystem->missing($testFile)) {
                ++$count;
                $this->filesystem->write($testFile, $testFileContent);

                $this->writeln(sprintf('File "%s" written.' . PHP_EOL, $testFile));

                continue;
            }

            $this->writeln('File already exists;(use "--force|-f" to overwrite)' . PHP_EOL);
        }

        $this->writeln([PHP_EOL, sprintf('Generated %d missing tests.', $count)]);

        return 0;
    }

    public function name(): string
    {
        return 'testify';
    }

    /**
     * @param list<string>|string $message
     */
    private function writeln(array|string $message): void
    {
        foreach ((array) $message as $line) {
            fwrite(STDOUT, sprintf('%s%s', $line, PHP_EOL));
        }
    }
}
