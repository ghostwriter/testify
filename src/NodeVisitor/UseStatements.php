<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\NodeVisitor;

use Ghostwriter\Testify\Exception\UseStatementNotFoundException;

use function array_key_exists;

final class UseStatements
{
    private array $uses = [];

    public function get(string $name): UseStatement
    {
        return $this->uses[$name] ?? throw new UseStatementNotFoundException($name);
    }

    public function has(string $name): bool
    {
        return array_key_exists($name, $this->uses);
    }

    public function set(string $name): void
    {
        $this->uses[$name] = new UseStatement($name);
    }

    public function uses(): array
    {
        return $this->uses;
    }
}
