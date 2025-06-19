<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Value;

interface WorkspaceInterface
{
    public function dryRun(): bool;

    public function fixture(): string;

    public function force(): bool;

    public function source(): string;

    public function tests(): string;

    public function vendor(): string;
}
