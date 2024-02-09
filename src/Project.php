<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Testify\Exception\FailedToCreateDirectoryException;
use Ghostwriter\Testify\Exception\PathDoesNotExistException;
use Ghostwriter\Testify\Exception\PathIsEmptyException;
use Ghostwriter\Testify\Exception\PathIsNotDirectoryException;
use Ghostwriter\Testify\Exception\PathIsNotStringException;
use Ghostwriter\Testify\Interface\ProjectInterface;
use Symfony\Component\Console\Input\InputInterface;

use const DIRECTORY_SEPARATOR;

use function is_dir;
use function is_string;
use function mkdir;
use function realpath;
use function trim;

final readonly class Project implements ProjectInterface
{
    private function __construct(
        public string $source,
        public string $tests,
        public bool $dryRun = false,
        public bool $force = false,
    ) {
    }

    public static function new(InputInterface $input): self
    {
        $source = $input->getArgument('source');

        if (! is_string($source)) {
            throw new PathIsNotStringException();
        }

        if (trim($source) === '') {
            throw new PathIsEmptyException();
        }

        $sourceDirectory = realpath($source);

        if ($sourceDirectory === false) {
            throw new PathDoesNotExistException($source);
        }

        if (! is_dir($sourceDirectory)) {
            throw new PathIsNotDirectoryException($source);
        }

        $tests = $input->getArgument('tests');

        if (! is_string($tests)) {
            throw new PathIsNotStringException();
        }

        if (trim($tests) === '') {
            throw new PathIsEmptyException();
        }

        $testsUnitDirectory = $tests . DIRECTORY_SEPARATOR . 'Unit';

        if (! is_dir($testsUnitDirectory)) {
            $makeDirectory = mkdir($testsUnitDirectory, 0777, true);
            if (! $makeDirectory || ! is_dir($testsUnitDirectory)) {
                throw new FailedToCreateDirectoryException($testsUnitDirectory);
            }
        }

        $testsDirectory = realpath($testsUnitDirectory);

        if ($testsDirectory === false) {
            throw new PathDoesNotExistException($tests);
        }

        return new self(
            $sourceDirectory,
            $testsDirectory,
            (bool) $input->getOption('dry-run'),
            (bool) $input->getOption('force')
        );
    }
}
