<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Runner;

use Generator;
use Ghostwriter\Filesystem\Interface\FilesystemInterface;
use Ghostwriter\Testify\Application\PhpFileFinder;
use Ghostwriter\Testify\Value\WorkspaceInterface;
use Override;

use const DIRECTORY_SEPARATOR;

use function dd;
use function str_replace;

final readonly class Runner implements RunnerInterface
{
    public function __construct(
        private FilesystemInterface $filesystem,
        private PhpFileFinder $phpFileFinder,
    ) {}

    #[Override]
    public function run(WorkspaceInterface $workspace): Generator
    {
        $sourceDirectory = $workspace->source();

        $unitTestsDirectory = $workspace->tests() . DIRECTORY_SEPARATOR . 'unit';

        if (! $this->filesystem->isDirectory($unitTestsDirectory)) {

            dd($unitTestsDirectory);
            //            $this->filesystem->cleanDirectory($unitTestsDirectory);
        }

        foreach ($this->phpFileFinder->find($sourceDirectory) as $file) {
            yield $file => str_replace([$sourceDirectory, '.php'], [$unitTestsDirectory, 'Test.php'], $file);
        }
    }
}
