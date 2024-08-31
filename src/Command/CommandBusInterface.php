<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Command;

interface CommandBusInterface
{
    public function dispatch(CommandInterface $command): int;
}
