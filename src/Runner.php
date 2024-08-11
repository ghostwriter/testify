<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Generator;
use Ghostwriter\Testify\Interface\ProjectInterface;
use Ghostwriter\Testify\Interface\RunnerInterface;
use Override;

use function str_replace;

final readonly class Runner implements RunnerInterface
{
    public function __construct(
        private PhpFileFinder $phpFileFinder,
    ) {
    }

    #[Override]
    public function run(ProjectInterface $project): Generator
    {
        $sourceDirectory = $project->source;
        $testsDirectory = $project->tests;

        foreach ($this->phpFileFinder->find($sourceDirectory) as $file) {
            yield $file => str_replace([$sourceDirectory, '.php'], [$testsDirectory, 'Test.php'], $file);
        }
    }
}
