<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Handler;

use Ghostwriter\Testify\Command\CommandInterface;
use Throwable;

interface HandlerInterface
{
    /**
     * @throws Throwable
     */
    public function handle(CommandInterface $command): int;
}
