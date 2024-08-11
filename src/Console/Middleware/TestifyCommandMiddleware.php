<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Middleware;

use Ghostwriter\Testify\Console\Command\TestifyCommand;
use Ghostwriter\Testify\Interface\CommandInterface;
use Ghostwriter\Testify\Interface\HandlerInterface;
use Ghostwriter\Testify\Interface\MiddlewareInterface;
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
