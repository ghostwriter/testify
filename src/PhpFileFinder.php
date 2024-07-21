<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Closure;
use Generator;
use SplFileInfo;

use function mb_strtolower;
use function str_ends_with;
use function str_starts_with;

final readonly class PhpFileFinder
{
    private Closure $isNotSupported;

    private Closure $isPhpFile;

    public function __construct(
        private Filesystem $filesystem,
    ) {
        $this->isPhpFile = static fn (SplFileInfo $file): bool => $file->getExtension() === 'php';

        $this->isNotSupported = static function (SplFileInfo $file): bool {
            $filename = $file->getFilename();
            return match (true) {
                // if the first letter is lowercase, it's not a class
                mb_strtolower($filename[0]) === $filename[0],
                str_starts_with($filename, 'Abstract'),
                str_ends_with($filename, 'Trait.php'),
                str_ends_with($filename, 'Interface.php'),
                str_ends_with($filename, 'Test.php') => true,
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

        foreach ($this->filesystem->recursiveDirectoryIterator($directory) as $file) {
            if (! $file instanceof SplFileInfo) {
                continue;
            }

            if ($match($file) === false) {
                continue;
            }

            if ($skip($file) === true) {
                continue;
            }

            yield $file->getPathname();
        }
    }
}
