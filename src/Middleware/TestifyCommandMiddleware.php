<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Middleware;

use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\Command\TestifyCommand;
use Ghostwriter\Testify\Handler\HandlerInterface;
use Override;
use Throwable;

final class TestifyCommandMiddleware implements MiddlewareInterface
{
    /**
     * @throws Throwable
     */
    #[Override]
    public function process(CommandInterface $command, HandlerInterface $handler): int
    {
        if ($command instanceof TestifyCommand) {
            return $command->execute();
        }

        return $handler->handle($command);
    }
}
