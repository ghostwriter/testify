<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Middleware;

use Ghostwriter\Testify\Interface\CommandInterface;
use Ghostwriter\Testify\Interface\HandlerInterface;
use Ghostwriter\Testify\Interface\MiddlewareInterface;
use Override;

final readonly class CommandMiddleware implements MiddlewareInterface
{
    #[Override]
    public function process(CommandInterface $command, HandlerInterface $handler): int {}
}
