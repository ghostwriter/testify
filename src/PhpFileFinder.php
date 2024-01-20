<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Closure;
use Generator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

use function str_ends_with;
use function str_starts_with;

final readonly class PhpFileFinder
{
    /**
     * @param null|Closure(SplFileInfo):bool $match
     * @param null|Closure(SplFileInfo):bool $skip
     *
     * @return Generator<string>
     */
    public function find(string $path, ?Closure $match = null, ?Closure $skip = null): Generator
    {
        $directory = new RecursiveDirectoryIterator($path);
        $iterator = new RecursiveIteratorIterator($directory);

        $match ??= static fn (SplFileInfo $file): bool => $file->getExtension() === 'php';
        $skip ??= static function (SplFileInfo $file): bool {
            $filename = $file->getFilename();
            return match (true) {
                str_starts_with($filename, 'Abstract'),
                str_ends_with($filename, 'Trait.php'),
                str_ends_with($filename, 'Interface.php'),
                str_ends_with($filename, 'Test.php') => true,
                default => false,
            };
        };

        foreach ($iterator as $info) {
            if (! $info instanceof SplFileInfo) {
                continue;
            }

            if (! $match($info)) {
                continue;
            }

            if ($skip($info)) {
                continue;
            }

            yield $info->getPathname();
        }
    }
}
