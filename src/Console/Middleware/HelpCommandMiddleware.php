<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Middleware;

use Ghostwriter\Testify\Console\Command\HelpCommand;
use Ghostwriter\Testify\Interface\Console\CommandInterface;
use Ghostwriter\Testify\Interface\Console\HandlerInterface;
use Ghostwriter\Testify\Interface\Console\MiddlewareInterface;
use Override;
use Throwable;

final class HelpCommandMiddleware implements MiddlewareInterface
{
    /**
     * @throws Throwable
     */
    #[Override]
    public function process(CommandInterface $command, HandlerInterface $commandHandler): int
    {
        if ($command instanceof HelpCommand) {
            return $command->execute();
        }

        return $commandHandler->handle($command);
    }
}
