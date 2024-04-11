<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\Generator\NameGeneratorInterface;

final readonly class InterfaceNameGenerator implements NameGeneratorInterface
{
    public function __construct(
        private string $name
    ) {}

    public function generate(): string
    {
        return $this->name;
    }

    public function name(): string
    {
        return $this->name;
    }
}
