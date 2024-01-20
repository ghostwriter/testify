<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Testify\Exception\PathDoesNotExistException;
use Ghostwriter\Testify\Exception\PathIsEmptyException;
use Ghostwriter\Testify\Exception\PathIsNotDirectoryException;
use Ghostwriter\Testify\Exception\PathIsNotStringException;
use Symfony\Component\Console\Input\InputInterface;

use function is_dir;
use function is_string;
use function realpath;
use function trim;

final readonly class Directory
{
    private function __construct(
        private string $path,
    ) {
    }

    public function path(): string
    {
        return $this->path;
    }

    public static function new(InputInterface $input): self
    {
        $path = $input->getArgument('source');

        if (! is_string($path)) {
            throw new PathIsNotStringException();
        }

        if (trim($path) === '') {
            throw new PathIsEmptyException();
        }

        $directory = realpath($path);

        if ($directory === false) {
            throw new PathDoesNotExistException($path);
        }

        if (! is_dir($directory)) {
            throw new PathIsNotDirectoryException($path);
        }

        return new self($directory);
    }
}
