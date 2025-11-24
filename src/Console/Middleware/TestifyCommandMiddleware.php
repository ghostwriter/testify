<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Middleware;

use Ghostwriter\Testify\Console\Command\CommandInterface;
use Ghostwriter\Testify\Console\Command\TestifyCommand;
use Ghostwriter\Testify\Console\Handler\HandlerInterface;
use Override;
use Throwable;

final class TestifyCommandMiddleware implements MiddlewareInterface
{
    /**
     * @throws Throwable
     */
    #[Override]
    public function process(CommandInterface $command, HandlerInterface $commandHandler): int
    {
        if (! $command instanceof TestifyCommand) {
            return $commandHandler->handle($command);
        }

        return $command->execute();
    }
}
