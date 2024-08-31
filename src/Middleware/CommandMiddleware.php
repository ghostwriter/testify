<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Middleware;

use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\Handler\HandlerInterface;
use Override;
use Throwable;

final readonly class CommandMiddleware implements MiddlewareInterface
{
    /**
     * @throws Throwable
     */
    #[Override]
    public function process(CommandInterface $command, HandlerInterface $handler): int
    {
        return $handler->handle($command);
    }
}
