<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console;

use Ghostwriter\Testify\Console\Command\CommandInterface;

interface CommandBusInterface
{
    public function dispatch(CommandInterface $command): int;
}
