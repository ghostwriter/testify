<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Value;

use Ghostwriter\Container\Attribute\Factory;
use Ghostwriter\Testify\Container\Factory\WorkspaceFactory;

#[Factory(WorkspaceFactory::class)]
final readonly class Workspace implements WorkspaceInterface
{
    public function __construct(
        private string $source,
        private string $tests,
        private bool $dryRun,
        private bool $force
    ) {
    }

    public static function new(string $source, string $tests, bool $dryRun = false, bool $force = false): self
    {
        return new self($source, $tests, $dryRun, $force);
    }

    public function dryRun(): bool
    {
        return $this->dryRun;
    }

    public function force(): bool
    {
        return $this->force;
    }

    public function source(): string
    {
        return $this->source;
    }

    public function tests(): string
    {
        return $this->tests;
    }
}
