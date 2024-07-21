<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Generator;
use Ghostwriter\Testify\Interface\ProjectInterface;
use Ghostwriter\Testify\Interface\RunnerInterface;
use Override;
use Symfony\Component\Console\Helper\ProgressBar;

use function str_replace;

final readonly class Runner implements RunnerInterface
{
    public function __construct(
        private ProgressBar $progressBar,
        private PhpFileFinder $phpFileFinder,
    ) {
    }

    #[Override]
    public function run(ProjectInterface $project): Generator
    {
        $sourceDirectory = $project->source;

        $testsDirectory = $project->tests;

        $this->progressBar->start();

        foreach ($this->phpFileFinder->find($sourceDirectory) as $file) {
            yield $file => str_replace([$sourceDirectory, '.php'], [$testsDirectory, 'Test.php'], $file);

            $this->progressBar->advance();
        }

        $this->progressBar->finish();
    }
}
