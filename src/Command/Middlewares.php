<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Command;

use Ghostwriter\Container\Attribute\Factory;
use Ghostwriter\Testify\Container\Factory\MiddlewaresFactory;
use Ghostwriter\Testify\Handler\HandlerInterface;
use Ghostwriter\Testify\Middleware\MiddlewareInterface;
use Override;
use RuntimeException;
use Throwable;

#[Factory(MiddlewaresFactory::class)]
final class Middlewares implements MiddlewareInterface
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
    public function process(CommandInterface $command, HandlerInterface $handler): int
    {
        if ($this->middlewares === []) {
            return $handler->handle($command);
        }

        $middleware = \array_shift($this->middlewares);

        if (! $middleware instanceof MiddlewareInterface) {
            throw new RuntimeException('Middleware must implement Middleware interface');
        }

        return $middleware->process($command, $handler);
    }
}
