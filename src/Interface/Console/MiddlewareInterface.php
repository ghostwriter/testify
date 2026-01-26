<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface\Console;

interface MiddlewareInterface
{
    public function process(CommandInterface $command, HandlerInterface $commandHandler): int;
}
