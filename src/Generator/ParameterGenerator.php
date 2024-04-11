<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\GeneratorInterface;

final class ParameterGenerator implements GeneratorInterface
{
    public function __construct(
        private string $name,
        private ?string $type = null,
        private bool $isOptional = false,
        private bool $isVariadic = false,
        private bool $isPassedByReference = false,
        private bool $isDefaultValueAvailable = false,
        private ?string $defaultValue = null,
        private array $attributes = [],
        private array $uses = [],
    ) {}

    public function generate(): string
    {
        $parameter = '';

        if ($this->isPassedByReference) {
            $parameter .= '&';
        }

        if ($this->isVariadic) {
            $parameter .= '...';
        }

        if ($this->type !== null) {
            $parameter .= $this->type . ' ';
        }

        $parameter .= '$' . $this->name;

        //        if ($this->isDefaultValueAvailable) {
        //            $parameter .= ' = ' . $this->defaultValue;
        //        }

        return $parameter;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function uses(): array
    {
        return $this->uses;
    }
}
