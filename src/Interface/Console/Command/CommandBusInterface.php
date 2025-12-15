<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface\Console\Command;

use Ghostwriter\Testify\Interface\Console\CommandInterface;

interface CommandBusInterface
{
    public function dispatch(CommandInterface $command): int;
}
