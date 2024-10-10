<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application;

use Generator;
use Ghostwriter\Filesystem\Interface\FilesystemInterface;
use Ghostwriter\Testify\Exception\ShouldNotHappenException;
use SplFileInfo;

final readonly class PhpFileFinder
{
    public function __construct(
        private FilesystemInterface $filesystem,
    ) {
    }

    /**
     * @return Generator<string>
     */
    public function find(string $directory): Generator
    {
        $directory = $this->filesystem->realpath($directory);

        foreach (
            $this->filesystem->regexIterator($directory, '#.+\.php$#iu') as $file
        ) {
            if (! $file instanceof SplFileInfo) {
                throw new ShouldNotHappenException('Invalid file');
            }

            $filename = $file->getBasename('.php');

            if (match (true) {
                // if the first letter is lowercase, it's not a class
                \mb_strtolower($filename[0]) === $filename[0],
                \str_starts_with($filename, 'Abstract'),
                \str_ends_with($filename, 'Trait'),
                \str_ends_with($filename, 'Interface'),
                \str_ends_with($filename, 'Test') => true,
                default => false,
            }) {
                continue;
            }

            yield $file->getPathname();
        }
    }
}
