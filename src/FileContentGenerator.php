<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Testify\Exception\StubNotAFileException;
use Ghostwriter\Testify\Exception\StubNotFoundException;
use Ghostwriter\Testify\Exception\StubNotReadableException;

use const DIRECTORY_SEPARATOR;

use function is_string;
use function str_replace;

final readonly class FileContentGenerator
{
    public function __construct(
        private Filesystem $filesystem,
        private string $resourcePath = __DIR__ . '/Resource',
    ) {
    }

    /**
     * @param array<string,string> $variables
     */
    public function render(string $content, array $variables): string
    {
        foreach ($variables as $key => $value) {
            if (! is_string($key)) {
                continue;
            }

            if (! is_string($value)) {
                continue;
            }

            $content = str_replace('{ ' . $key . ' }', $value, $content);
        }

        return $content;
    }

    public function stub(string $name): string
    {
        $path = $this->resourcePath . DIRECTORY_SEPARATOR . $name . '.stub';

        if ($this->filesystem->missing($path)) {
            throw new StubNotFoundException($path);
        }

        if (! $this->filesystem->isFile($path)) {
            throw new StubNotAFileException($path);
        }

        if (! $this->filesystem->isReadable($path)) {
            throw new StubNotReadableException($path);
        }

        return $path;
    }
}
