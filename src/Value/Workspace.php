<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Value;

use Ghostwriter\Container\Attribute\Factory;
use Ghostwriter\Testify\Container\Factory\WorkspaceFactory;
use Ghostwriter\Testify\Interface\WorkspaceInterface;

#[Factory(WorkspaceFactory::class)]
final readonly class Workspace implements WorkspaceInterface
{
    public function __construct(
        private string $source,
        private string $tests,
        private bool $dryRun = false,
        private bool $force = false,
    ) {
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
