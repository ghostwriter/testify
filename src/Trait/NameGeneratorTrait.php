<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Trait;

use Override;

trait NameGeneratorTrait
{
    public function __construct(
        private readonly string $name
    ) {}

    #[Override]
    final public function generate(): string
    {
        return $this->name;
    }
}
