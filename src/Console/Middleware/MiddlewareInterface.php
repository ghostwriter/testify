<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Middleware;

use Ghostwriter\Testify\Console\Command\CommandInterface;
use Ghostwriter\Testify\Console\Handler\HandlerInterface;

interface MiddlewareInterface
{
    public function process(CommandInterface $command, HandlerInterface $commandHandler): int;
}
