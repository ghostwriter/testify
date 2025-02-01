<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Value;

use InvalidArgumentException;

final readonly class Argv
{
    public array $argv;

    public function __construct(
        string ...$arguments,
    ) {
        $this->argv = $arguments;
    }

    public static function new(array $arguments): self
    {
        return new self(...$arguments);
    }

    public function get(string $argument, ?string $default = null): string
    {
        /** @var string */
        return $this->argv[$argument]
            ?? $default
            ?? throw new InvalidArgumentException(\sprintf('Argument "%s" not found', $argument));
    }

    public function has(string $argument): bool
    {
        return \in_array($argument, $this->argv, true);
    }
}
