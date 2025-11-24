<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Command;

interface CommandInterface
{
    public function execute(): int;

    public function name(): string;
}
