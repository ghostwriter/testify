<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface\Console\Handler;

use Ghostwriter\Testify\Interface\Console\CommandInterface;
use Ghostwriter\Testify\Interface\Console\HandlerInterface;
use Throwable;

interface ExceptionHandlerInterface
{
    public function handle(Throwable $throwable, CommandInterface $command, HandlerInterface $commandHandler): int;
}
