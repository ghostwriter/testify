<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Middleware;

use Ghostwriter\Testify\Console\Command\CommandInterface;
use Ghostwriter\Testify\Console\Handler\HandlerInterface;
use Ghostwriter\Testify\Console\Handler\NotFoundHandler;
use Override;

final readonly class NotFoundMiddleware implements MiddlewareInterface
{
    public function __construct(
        private NotFoundHandler $notFoundHandler,
    ) {}

    #[Override]
    public function process(CommandInterface $command, HandlerInterface $commandHandler): int
    {
        return $this->notFoundHandler->handle($command);
    }
}
