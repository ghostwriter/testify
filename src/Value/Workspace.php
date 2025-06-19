<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Value;

use Ghostwriter\Container\Attribute\Factory;
use Ghostwriter\Testify\Container\Factory\WorkspaceFactory;
use Override;

use const DIRECTORY_SEPARATOR;

use function dirname;

#[Factory(WorkspaceFactory::class)]
final readonly class Workspace implements WorkspaceInterface
{
    public function __construct(
        private string $source,
        private string $tests,
        private string $fixture,
        private string $vendor,
        private bool $dryRun,
        private bool $force,
    ) {}

    public static function new(string $source, string $tests, bool $dryRun = false, bool $force = false): self
    {
        $fixture = $tests . DIRECTORY_SEPARATOR . 'fixture';

        $vendor = dirname($source) . DIRECTORY_SEPARATOR . 'vendor';

        return new self(
            source: $source,
            tests: $tests,
            fixture: $fixture,
            vendor: $vendor,
            dryRun: $dryRun,
            force: $force,
        );
    }

    #[Override]
    public function dryRun(): bool
    {
        return $this->dryRun;
    }

    #[Override]
    public function fixture(): string
    {
        return $this->fixture;
    }

    #[Override]
    public function force(): bool
    {
        return $this->force;
    }

    #[Override]
    public function source(): string
    {
        return $this->source;
    }

    #[Override]
    public function tests(): string
    {
        return $this->tests;
    }

    #[Override]
    public function vendor(): string
    {
        return $this->vendor;
    }
}
