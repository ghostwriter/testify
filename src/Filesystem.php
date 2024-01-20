<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Testify\Exception\FailedToCreateDirectoryException;
use Ghostwriter\Testify\Exception\FailedToReadFileException;
use Ghostwriter\Testify\Exception\FailedToWriteFileException;
use Ghostwriter\Testify\Exception\FileNotFoundException;

use function basename;
use function dirname;
use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function is_dir;
use function mkdir;

final readonly class Filesystem
{
    public function basename(string $path, string $suffix = ''): string
    {
        return basename($path, $suffix);
    }

    public function createDirectory(string $path, int $mode = 0777, bool $recursive = true): void
    {
        $makeDirectory = mkdir($path, $mode, $recursive);
        if (! $makeDirectory || ! is_dir($path)) {
            throw new FailedToCreateDirectoryException($path);
        }
    }

    public function exists(string $path): bool
    {
        return file_exists($path);
    }

    public function missing(string $path): bool
    {
        return ! file_exists($path);
    }

    /**
     * @param int<1,max> $levels
     */
    public function parentDirectory(string $path, int $levels = 1): string
    {
        return dirname($path, $levels);
    }

    public function read(string $path): string
    {
        if (! file_exists($path)) {
            throw new FileNotFoundException($path);
        }

        $content = file_get_contents($path);

        if ($content === false) {
            throw new FailedToReadFileException($path);
        }

        return $content;
    }

    public function save(string $path, string $content): void
    {
        if (! file_exists($path)) {
            $parentDirectory = dirname($path);

            if (! file_exists($parentDirectory)) {
                $this->createDirectory($parentDirectory);
            }
        }

        $bytesWritten = file_put_contents($path, $content);

        if ($bytesWritten === false) {
            throw new FailedToWriteFileException($path);
        }
    }
}
