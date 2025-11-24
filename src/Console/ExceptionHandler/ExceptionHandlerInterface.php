<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\ExceptionHandler;

use Ghostwriter\Testify\Console\Command\CommandInterface;
use Ghostwriter\Testify\Console\Handler\HandlerInterface;
use Throwable;

interface ExceptionHandlerInterface
{
    public function handle(Throwable $throwable, CommandInterface $command, HandlerInterface $commandHandler): int;
}
