<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface\Console;

use Throwable;

interface HandlerInterface
{
    /** @throws Throwable */
    public function handle(CommandInterface $command): int;
}
