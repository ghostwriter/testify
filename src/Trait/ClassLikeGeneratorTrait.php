<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Trait;

use Ghostwriter\Testify\Interface\Generator\AttributeGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\ConstantGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\MethodGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\PropertyGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\TraitUseGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\DocBlockGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\DockBlockGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\NameGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\UseGeneratorInterface;
use Override;

trait ClassLikeGeneratorTrait
{
    /**
     * @param list<AttributeGeneratorInterface> $attributes
     * @param list<NameGeneratorInterface>      $extends
     * @param list<ConstantGeneratorInterface>  $constants
     * @param list<DockBlockGeneratorInterface> $dockBlocks
     * @param list<MethodGeneratorInterface>    $methods
     * @param list<NameGeneratorInterface>      $implements
     * @param list<PropertyGeneratorInterface>  $properties
     * @param list<TraitUseGeneratorInterface>  $traitUses
     * @param list<UseGeneratorInterface>       $uses
     */
    final public function __construct(
        private readonly string $name,
        private array $extends = [],
        private array $attributes = [],
        private array $constants = [],
        private array $dockBlocks = [],
        private array $implements = [],
        private array $methods = [],
        private array $properties = [],
        private array $traitUses = [],
        private array $uses = [],
        private readonly bool $isAbstract = false,
        private readonly bool $isFinal = false,
        private readonly bool $isReadonly = false,
    ) {}

    #[Override]
    final public function compare(ClassLikeGeneratorInterface $other): int
    {
        return $this->name() <=> $other->name();
    }

    #[Override]
    final public function name(): string
    {
        return $this->name;
    }

    /** @return list<UseGeneratorInterface> */
    #[Override]
    final public function uses(): array
    {
        return $this->uses;
    }

    #[Override]
    final public function addUse(UseGeneratorInterface $use): void
    {
        $this->uses[$use->name()] = $use;
    }

    /** @return list<AttributeGeneratorInterface> */
    #[Override]
    final public function attributes(): array
    {
        return $this->attributes;
    }

    /** @return list<DocBlockGeneratorInterface> */
    #[Override]
    final public function dockBlocks(): array
    {
        return $this->dockBlocks;
    }

    #[Override]
    final public function addAttribute(AttributeGeneratorInterface $attribute): void
    {
        $this->attributes[$attribute->name()] = $attribute;
    }

    /** @return list<ConstantGeneratorInterface> */
    #[Override]
    final public function constants(): array
    {
        return $this->constants;
    }

    #[Override]
    final public function addConstant(ConstantGeneratorInterface $constant): void
    {
        $this->constants[$constant->name()] = $constant;
    }

    /** @return list<MethodGeneratorInterface> */
    #[Override]
    final public function methods(): array
    {
        return $this->methods;
    }

    #[Override]
    final public function addMethod(MethodGeneratorInterface $method): void
    {
        $this->methods[$method->name()] = $method;
    }

    /** @return list<PropertyGeneratorInterface> */
    #[Override]
    final public function properties(): array
    {
        return $this->properties;
    }

    #[Override]
    final public function addProperty(PropertyGeneratorInterface $property): void
    {
        $this->properties[$property->name()] = $property;
    }

    /** @return list<TraitUseGeneratorInterface> */
    #[Override]
    final public function traitUses(): array
    {
        return $this->traitUses;
    }

    #[Override]
    final public function addTraitUse(TraitUseGeneratorInterface $traitUse): void
    {
        $this->traitUses[$traitUse->name()] = $traitUse;
    }
}
