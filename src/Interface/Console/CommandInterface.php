<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface\Console;

interface CommandInterface
{
    public function execute(): int;

    public function name(): string;
}
