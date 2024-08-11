<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Container\Attribute\Factory;
use Ghostwriter\Testify\Container\Factory\WorkspaceFactory;
use Ghostwriter\Testify\Interface\WorkspaceInterface;

#[Factory(WorkspaceFactory::class)]
final readonly class Workspace implements WorkspaceInterface
{
    public function __construct(
        public string $source,
        public string $tests,
        public bool $dryRun = false,
        public bool $force = false,
    ) {
    }
}
