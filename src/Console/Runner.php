<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console;

use Generator;
use Ghostwriter\Testify\Interface\RunnerInterface;
use Ghostwriter\Testify\Interface\WorkspaceInterface;
use Ghostwriter\Testify\PhpFileFinder;
use Override;

use const DIRECTORY_SEPARATOR;

use function str_replace;

final readonly class Runner implements RunnerInterface
{
    public function __construct(
        private PhpFileFinder $phpFileFinder,
    ) {
    }

    #[Override]
    public function run(WorkspaceInterface $project): Generator
    {
        $sourceDirectory = $project->source;
        $testsDirectory = $project->tests . DIRECTORY_SEPARATOR . 'Unit';

        foreach ($this->phpFileFinder->find($sourceDirectory) as $file) {
            yield $file => str_replace([$sourceDirectory, '.php'], [$testsDirectory, 'Test.php'], $file);
        }
    }
}
