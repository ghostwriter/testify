<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application;

use Closure;
use Generator;
use Ghostwriter\Filesystem\Interface\FilesystemInterface;
use Ghostwriter\Filesystem\Interface\PathInterface;

final readonly class PhpFileFinder
{
    private Closure $isNotSupported;

    private Closure $isPhpFile;

    public function __construct(
        private FilesystemInterface $filesystem,
    ) {
        $this->isPhpFile = static fn (PathInterface $path): bool => \str_ends_with($path->toString(), '.php');

        $this->isNotSupported = static function (PathInterface $path) use ($filesystem): bool {
            $filename = $filesystem->basename($path->toString());
            return match (true) {
                // if the first letter is lowercase, it's not a class
                \mb_strtolower($filename[0]) === $filename[0],
                \str_starts_with($filename, 'Abstract'),
                \str_ends_with($filename, 'Trait.php'),
                \str_ends_with($filename, 'Interface.php'),
                \str_ends_with($filename, 'Test.php') => true,
                default => false,
            };
        };
    }

    /**
     * @return Generator<string>
     */
    public function find(string $directory): Generator
    {
        $match = $this->isPhpFile;
        $skip = $this->isNotSupported;

        foreach ($this->filesystem->recursiveIterator($directory) as $file) {
            if (! $file instanceof PathInterface) {
                continue;
            }

            if ($match($file) === false) {
                continue;
            }

            if ($skip($file) === true) {
                continue;
            }

            yield $file->toString();
        }
    }
}
