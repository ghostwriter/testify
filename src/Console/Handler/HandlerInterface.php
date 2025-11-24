<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Handler;

use Ghostwriter\Testify\Console\Command\CommandInterface;
use Throwable;

interface HandlerInterface
{
    /**
     * @throws Throwable
     */
    public function handle(CommandInterface $command): int;
}
