<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Feature\Help;

use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\CommandHandler\CommandHandlerInterface;
use Ghostwriter\Testify\Middleware\MiddlewareInterface;
use Override;
use Throwable;

final class HelpCommandMiddleware implements MiddlewareInterface
{
    /**
     * @throws Throwable
     */
    #[Override]
    public function process(CommandInterface $command, CommandHandlerInterface $commandHandler): int
    {
        if ($command instanceof HelpCommand) {
            return $command->execute();
        }

        return $commandHandler->handle($command);
    }
}
