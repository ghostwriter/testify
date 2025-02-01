<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Runner;

use Generator;
use Ghostwriter\Testify\Application\PhpFileFinder;
use Ghostwriter\Testify\Value\WorkspaceInterface;
use Override;

use const DIRECTORY_SEPARATOR;

final readonly class Runner implements RunnerInterface
{
    public function __construct(
        private PhpFileFinder $phpFileFinder,
    ) {
    }

    #[Override]
    public function run(WorkspaceInterface $workspace): Generator
    {
        $sourceDirectory = $workspace->source();

        $unitTestsDirectory = $workspace->tests() . DIRECTORY_SEPARATOR . 'unit';

        foreach ($this->phpFileFinder->find($sourceDirectory) as $file) {
            yield $file => \str_replace([$sourceDirectory, '.php'], [$unitTestsDirectory, 'Test.php'], $file);
        }
    }
}
