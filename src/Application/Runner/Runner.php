<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Runner;

use Generator;
use Ghostwriter\Filesystem\Interface\FilesystemInterface;
use Ghostwriter\Testify\Application\PhpFileFinder;
use Ghostwriter\Testify\Application\Value\WorkspaceInterface;
use Override;
use RuntimeException;

use const DIRECTORY_SEPARATOR;

use function sprintf;
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

        $unitTestsDirectory = $workspace->tests() . DIRECTORY_SEPARATOR . 'Unit';

        if (! $this->filesystem->isDirectory($unitTestsDirectory)) {
            throw new RuntimeException(sprintf(
                'Unit tests directory "%s" does not exist',
                $unitTestsDirectory
            ));
        }

        foreach ($this->phpFileFinder->find($sourceDirectory) as $file) {
            yield $file => str_replace([$sourceDirectory, '.php'], [$unitTestsDirectory, 'Test.php'], $file);
        }
    }
}
