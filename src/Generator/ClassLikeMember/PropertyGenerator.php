<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator\ClassLikeMember;

use Ghostwriter\Testify\Interface\Generator\AttributeGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\PropertyGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMemberGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\UseGeneratorInterface;
use Override;

final readonly class PropertyGenerator implements PropertyGeneratorInterface
{
    /**
     * @param array<class-string<AttributeGeneratorInterface>> $attributes
     * @param array<class-string<UseGeneratorInterface>>       $uses
     */
    public function __construct(
        private string $name,
        private mixed $value,
        private bool $isStatic = false,
        private bool $isPublic = true,
        private bool $isProtected = false,
        private bool $isPrivate = false,
        private bool $isReadonly = false,
        private array $attributes = [],
        private array $uses = [],
    ) {
    }

    /** @return array<class-string<AttributeGeneratorInterface>> */
    #[Override]
    public function attributes(): array
    {
        return $this->attributes;
    }

    #[Override]
    public function compare(ClassLikeMemberGeneratorInterface $classLikeMemberGenerator): int
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

    /** @return array<class-string<UseGeneratorInterface>> */
    #[Override]
    public function uses(): array
    {
        return $this->uses;
    }
}
