<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\CommandHandler;

use Ghostwriter\Testify\Command\CommandInterface;
use Throwable;

interface CommandHandlerInterface
{
    /**
     * @throws Throwable
     */
    public function handle(CommandInterface $command): int;
}
