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
    ) {
    }

    #[Override]
    final public function addAttribute(AttributeGeneratorInterface $attributeGenerator): void
    {
        $this->attributes[$attributeGenerator->name()] = $attributeGenerator;
    }

    #[Override]
    final public function addConstant(ConstantGeneratorInterface $constantGenerator): void
    {
        $this->constants[$constantGenerator->name()] = $constantGenerator;
    }

    #[Override]
    final public function addMethod(MethodGeneratorInterface $methodGenerator): void
    {
        $this->methods[$methodGenerator->name()] = $methodGenerator;
    }

    #[Override]
    final public function addProperty(PropertyGeneratorInterface $propertyGenerator): void
    {
        $this->properties[$propertyGenerator->name()] = $propertyGenerator;
    }

    #[Override]
    final public function addTraitUse(TraitUseGeneratorInterface $traitUseGenerator): void
    {
        $this->traitUses[$traitUseGenerator->name()] = $traitUseGenerator;
    }

    #[Override]
    final public function addUse(UseGeneratorInterface $useGenerator): void
    {
        $this->uses[$useGenerator->name()] = $useGenerator;
    }

    /** @return list<AttributeGeneratorInterface> */
    #[Override]
    final public function attributes(): array
    {
        return $this->attributes;
    }

    #[Override]
    final public function compare(ClassLikeGeneratorInterface $classLikeGenerator): int
    {
        return $this->name() <=> $classLikeGenerator->name();
    }

    /** @return list<ConstantGeneratorInterface> */
    #[Override]
    final public function constants(): array
    {
        return $this->constants;
    }

    /** @return list<DocBlockGeneratorInterface> */
    #[Override]
    final public function dockBlocks(): array
    {
        return $this->dockBlocks;
    }

    /** @return list<MethodGeneratorInterface> */
    #[Override]
    final public function methods(): array
    {
        return $this->methods;
    }

    #[Override]
    final public function name(): string
    {
        return $this->name;
    }

    /** @return list<PropertyGeneratorInterface> */
    #[Override]
    final public function properties(): array
    {
        return $this->properties;
    }

    /** @return list<TraitUseGeneratorInterface> */
    #[Override]
    final public function traitUses(): array
    {
        return $this->traitUses;
    }

    /** @return list<UseGeneratorInterface> */
    #[Override]
    final public function uses(): array
    {
        return $this->uses;
    }
}
