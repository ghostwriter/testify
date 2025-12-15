<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Middleware;

use Ghostwriter\Testify\Console\Command\GenerateCommand;
use Ghostwriter\Testify\Console\Handler\GenerateHandler;
use Ghostwriter\Testify\Interface\Console\CommandInterface;
use Ghostwriter\Testify\Interface\Console\HandlerInterface;
use Ghostwriter\Testify\Interface\Console\MiddlewareInterface;
use Override;

final readonly class GenerateMiddleware implements MiddlewareInterface
{
    public function __construct(
        private GenerateHandler $generateHandler,
    ) {}

    #[Override]
    public function process(CommandInterface $command, HandlerInterface $commandHandler): int
    {
        if ($command instanceof GenerateCommand) {
            return $this->generateHandler->handle($command);
        }

        return $commandHandler->handle($command);
    }
}
