<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Command;

use Ghostwriter\Testify\Filesystem;
use Ghostwriter\Testify\Interface\CommandInterface;
use Ghostwriter\Testify\Interface\PrinterInterface;
use Ghostwriter\Testify\Interface\RunnerInterface;
use Ghostwriter\Testify\Project;
use Ghostwriter\Testify\TestBuilder;
use Override;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\SingleCommandApplication;
use Throwable;

use const PHP_EOL;

use function sprintf;

final readonly class TestifyCommand implements CommandInterface
{
    /**
     * @throws Throwable
     */
    public function __construct(
        private SingleCommandApplication $application,
        private Filesystem $filesystem,
        private RunnerInterface $runner,
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
        return $this->application->setCode(
            function (InputInterface $input, OutputInterface $output): int {
                $output->writeln(
                    sprintf(
                        '<info>%s</info> by <comment>%s</comment> and contributors. <error>%s</error>' . PHP_EOL,
                        'Testify',
                        'Nathanael Esayeas',
                        '#BlackLivesMatter'
                    )
                );

                try {
                    $project = Project::new($input);
                } catch (Throwable $exception) {
                    $output->writeln(
                        sprintf(
                            '<error>%s: %s</error>' . PHP_EOL . PHP_EOL . '%s',
                            $exception::class,
                            $exception->getMessage(),
                            $exception->getTraceAsString()
                        )
                    );

                    return Command::INVALID;
                }

                $count = 0;
                $dryRun = $project->dryRun;
                $force = $project->force;
                foreach ($this->runner->run($project) as $file => $testFile) {
                    $output->writeln([
                        'Class <comment>' . $file . '</comment> is missing a test.',
                        'Generating <info>' . $testFile . '</info>.',
                        PHP_EOL,
                    ], OutputInterface::VERBOSITY_VERBOSE);

                    $fileGenerator = $this->testBuilder->build($file, $testFile);

                    $testFileContent = $this->printer->print($fileGenerator);

                    $output->writeln(
                        ['------', PHP_EOL . $testFileContent . PHP_EOL],
                        OutputInterface::VERBOSITY_VERBOSE
                    );

                    if ($dryRun) {
                        $output->writeln('<info>Dry run, not writing file.</info>');

                        continue;
                    }

                    if ($force || $this->filesystem->missing($testFile)) {
                        ++$count;
                        $this->filesystem->save($testFile, $testFileContent);

                        $output->writeln(
                            sprintf('<info>File "%s" written.</info>' . PHP_EOL, $testFile),
                            OutputInterface::VERBOSITY_VERBOSE
                        );

                        continue;
                    }

                    $output->writeln(
                        '<info>File already exists</info>;<comment>(use "--force|-f" to overwrite)</comment>' . PHP_EOL,
                        OutputInterface::VERBOSITY_VERBOSE
                    );
                }

                $output->writeln(
                    [PHP_EOL, sprintf('<comment>Generated <info>%d</info> missing tests.</comment>', $count)]
                );

                return Command::SUCCESS;
            }
        )->run();
    }
}
