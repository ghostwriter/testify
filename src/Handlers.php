<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Testify\Interface\CommandInterface;
use Ghostwriter\Testify\Interface\HandlerInterface;
use Override;
use RuntimeException;

use function array_shift;

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

    public static function new(HandlerInterface ...$handlers): self
    {
        return new self($handlers);
    }

    public function add(HandlerInterface ...$handlers): void
    {
        $this->handlers = [...$this->handlers, ...$handlers];
    }

    public function toArray(): array
    {
        return $this->handlers;
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
}
