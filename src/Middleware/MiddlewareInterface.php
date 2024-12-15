<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Middleware;

use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\CommandHandler\CommandHandlerInterface;

interface MiddlewareInterface
{
    public function process(CommandInterface $command, CommandHandlerInterface $commandHandler): int;
}
