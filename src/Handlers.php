<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Container\Attribute\Factory;
use Ghostwriter\Testify\Factory\HandlersFactory;
use Ghostwriter\Testify\Interface\CommandInterface;
use Ghostwriter\Testify\Interface\HandlerInterface;
use Override;
use RuntimeException;

use function array_shift;

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

    public function add(HandlerInterface ...$handler): void
    {
        $this->handlers = [...$this->handlers, ...$handler];
    }

    #[Override]
    public function handle(CommandInterface $command): int
    {
        $handler = array_shift($this->handlers);

        if (! $handler instanceof HandlerInterface) {
            return $command->execute();
        }

        return $handler->handle($command);
    }

    public function toArray(): array
    {
        return $this->handlers;
    }

    public static function new(HandlerInterface ...$handler): self
    {
        return new self($handler);
    }
}
