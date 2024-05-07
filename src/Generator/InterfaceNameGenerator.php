<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\Generator\NameGeneratorInterface;
use Override;

final readonly class InterfaceNameGenerator implements NameGeneratorInterface
{
    public function __construct(
        private string $name
    ) {}

    #[Override]
    public function generate(): string
    {
        return $this->name;
    }

    #[Override]
    public function name(): string
    {
        return $this->name;
    }
}
