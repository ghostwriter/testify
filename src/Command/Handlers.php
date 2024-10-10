<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Command;

use Ghostwriter\Container\Attribute\Factory;
use Ghostwriter\Testify\Container\Factory\HandlersFactory;
use Ghostwriter\Testify\Handler\HandlerInterface;
use Override;
use RuntimeException;

#[Factory(HandlersFactory::class)]
final class Handlers implements HandlerInterface
{
    /**
     * @param array<HandlerInterface> $handlers
     */
    public function __construct(
        private array $handlers = []
    ) {
        foreach ($this->handlers as $handler) {
            if (! $handler instanceof HandlerInterface) {
                throw new RuntimeException('Handler must implement ' . HandlerInterface::class);
            }
        }
    }

    public static function new(HandlerInterface ...$handler): self
    {
        return new self($handler);
    }

    public function add(HandlerInterface ...$handler): void
    {
        $this->handlers = [...$this->handlers, ...$handler];
    }

    #[Override]
    public function handle(CommandInterface $command): int
    {
        $handler = \array_shift($this->handlers);

        if (! $handler instanceof HandlerInterface) {
            return $command->execute();
        }

        return $handler->handle($command);
    }

    public function toArray(): array
    {
        return $this->handlers;
    }
}
