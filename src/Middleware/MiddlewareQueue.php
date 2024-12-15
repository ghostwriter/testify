<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Middleware;

use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\CommandHandler\CommandHandlerInterface;
use Override;
use RuntimeException;
use Throwable;

final class MiddlewareQueue implements MiddlewareQueueInterface
{
    /**
     * @param array<MiddlewareInterface> $middlewares
     *
     * @throws Throwable
     */
    public function __construct(
        private array $middlewares = []
    ) {
        foreach ($this->middlewares as $middleware) {
            if (! $middleware instanceof MiddlewareInterface) {
                throw new RuntimeException('Middleware must implement ' . MiddlewareInterface::class);
            }
        }
    }

    /**
     * @throws Throwable
     */
    public static function new(MiddlewareInterface ...$middleware): self
    {
        return new self($middleware);
    }

    public function add(MiddlewareInterface ...$middleware): void
    {
        $this->middlewares = [...$this->middlewares, ...$middleware];
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function handle(CommandInterface $command): int
    {
        return $this->process($command, $this);
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function process(CommandInterface $command, CommandHandlerInterface $commandHandler): int
    {
        if ($this->middlewares === []) {
            return $commandHandler->handle($command);
        }

        $middleware = \array_shift($this->middlewares);

        if (! $middleware instanceof MiddlewareInterface) {
            throw new RuntimeException('Middleware must implement Middleware interface');
        }

        return $middleware->process($command, $commandHandler);
    }
}
