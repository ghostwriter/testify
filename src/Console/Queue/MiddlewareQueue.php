<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Queue;

use Ghostwriter\Testify\Console\Command\CommandInterface;
use Ghostwriter\Testify\Console\Handler\HandlerInterface;
use Ghostwriter\Testify\Console\Middleware\MiddlewareInterface;
use Override;
use RuntimeException;
use Throwable;

use function array_shift;
use function dump;

final class MiddlewareQueue implements MiddlewareQueueInterface
{
    /**
     * @param list<MiddlewareInterface> $middlewares
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
        dump('MiddlewareQueue::handle called');

        return $this->process($command, $this);
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function process(CommandInterface $command, HandlerInterface $commandHandler): int
    {
        if ([] === $this->middlewares) {
            return $commandHandler->handle($command);
        }

        $middleware = array_shift($this->middlewares);

        if (! $middleware instanceof MiddlewareInterface) {
            throw new RuntimeException('Middleware must implement Middleware interface');
        }

        return $middleware->process($command, $commandHandler);
    }
}
