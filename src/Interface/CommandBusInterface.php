<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface;

interface CommandBusInterface
{
    public function dispatch(CommandInterface $command): int;
}
