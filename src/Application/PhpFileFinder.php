<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application;

use Generator;
use Ghostwriter\Filesystem\Interface\FilesystemInterface;
use SplFileInfo;
use TypeError;

use function get_debug_type;
use function mb_strtolower;
use function sprintf;
use function str_ends_with;
use function str_starts_with;

final readonly class PhpFileFinder implements FinderInterface
{
    public function __construct(
        private FilesystemInterface $filesystem,
    ) {}

    /** @return Generator<string> */
    public function find(string $directory): Generator
    {
        foreach ($this->filesystem->recursiveIterator($directory) as $file) {
            if (! $file instanceof SplFileInfo) {
                throw new TypeError(
                    sprintf('Expected a "%s" instance, but got %s', SplFileInfo::class, get_debug_type($file))
                );
            }

            $path = $file->getRealPath();

            if (! str_ends_with($path, '.php')) {
                continue;
            }

            $filename = $this->filesystem->basename($path);

            $skip = match (true) {
                str_starts_with($filename, 'Abstract'),
                str_ends_with($filename, 'Trait.php'),
                str_ends_with($filename, 'Interface.php'),
                str_ends_with($filename, 'Test.php'),
                // if the first letter is lowercase, it's not a class
                mb_strtolower($filename[0]) === $filename[0] => true,
                default => false,
            };

            if ($skip) {
                continue;
            }

            yield $path => $path;
        }
    }
}
