<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Middleware;

use Ghostwriter\Testify\Command\TestifyCommand;
use Ghostwriter\Testify\Interface\CommandInterface;
use Ghostwriter\Testify\Interface\HandlerInterface;
use Ghostwriter\Testify\Interface\MiddlewareInterface;
use Override;

final class TestifyCommandMiddleware implements MiddlewareInterface
{
    #[Override]
    public function process(CommandInterface $command, HandlerInterface $handler): int
    {
        if ($command instanceof TestifyCommand) {
            return $command->execute();
        }

        return $handler->handle($command);
    }
}
