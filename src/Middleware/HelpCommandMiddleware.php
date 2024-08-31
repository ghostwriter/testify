<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Middleware;

use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\Command\HelpCommand;
use Ghostwriter\Testify\Handler\HandlerInterface;
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
