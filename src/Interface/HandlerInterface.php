<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface;

interface HandlerInterface
{
    public function handle(CommandInterface $command): int;
}
