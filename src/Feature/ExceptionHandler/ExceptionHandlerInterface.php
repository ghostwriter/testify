<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Feature\ExceptionHandler;

use Ghostwriter\Testify\Command\CommandInterface;
use Throwable;

interface ExceptionHandlerInterface
{
    public function handle(CommandInterface $command, Throwable $throwable): int;
}
