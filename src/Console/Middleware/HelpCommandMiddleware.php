<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Middleware;

use Ghostwriter\Testify\Console\Command\HelpCommand;
use Ghostwriter\Testify\Interface\CommandInterface;
use Ghostwriter\Testify\Interface\HandlerInterface;
use Ghostwriter\Testify\Interface\MiddlewareInterface;
use Override;
use Throwable;

final class HelpCommandMiddleware implements MiddlewareInterface
{
    /**
     * @throws Throwable
     */
    #[Override]
    public function process(CommandInterface $command, HandlerInterface $handler): int
    {
        if ($command instanceof HelpCommand) {
            return $command->execute();
        }

        return $handler->handle($command);
    }
}
