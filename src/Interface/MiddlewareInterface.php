<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface;

interface MiddlewareInterface
{
    public function process(CommandInterface $command, HandlerInterface $handler): int;
}
