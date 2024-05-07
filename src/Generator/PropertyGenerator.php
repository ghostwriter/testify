<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\PropertyGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMemberGeneratorInterface;
use Override;

final readonly class PropertyGenerator implements PropertyGeneratorInterface
{
    public function __construct(
        private string $name,
        private mixed $value,
        private bool $isStatic = false,
        private bool $isPublic = true,
        private bool $isProtected = false,
        private bool $isPrivate = false,
        private bool $isReadonly = false,
    ) {}

    #[Override]
    public function compare(ClassLikeMemberGeneratorInterface $right): int
    {
        return $this->name <=> $right->name();
    }

    #[Override]
    public function generate(): string
    {
        $code = '';

        if ($this->isStatic) {
            $code .= 'static ';
        }

        if ($this->isPublic) {
            $code .= 'public ';
        }

        if ($this->isProtected) {
            $code .= 'protected ';
        }

        if ($this->isPrivate) {
            $code .= 'private ';
        }

        if ($this->isReadonly) {
            $code .= 'readonly ';
        }

        $code .= '$' . $this->name;

        if ($this->value !== null) {
            $code .= ' = ' . $this->value;
        }

        return $code;
    }

    #[Override]
    public function name(): string
    {
        return $this->name;
    }
}
