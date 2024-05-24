<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface\Generator;

use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\ConstantGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\MethodGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\PropertyGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\TraitUseGeneratorInterface;
use Ghostwriter\Testify\Interface\GeneratorInterface;

interface ClassLikeGeneratorInterface extends GeneratorInterface
{
    public function compare(self $other): int;

    /** @return list<DocBlockGeneratorInterface> */
    public function dockBlocks(): array;

    public function name(): string;

    /** @return list<UseGeneratorInterface> */
    public function uses(): array;

    public function addUse(UseGeneratorInterface $use): void;

    /** @return list<AttributeGeneratorInterface> */
    public function attributes(): array;

    public function addAttribute(AttributeGeneratorInterface $attribute): void;

    /** @return list<ConstantGeneratorInterface> */
    public function constants(): array;

    public function addConstant(ConstantGeneratorInterface $constant): void;

    /** @return list<MethodGeneratorInterface> */
    public function methods(): array;

    public function addMethod(MethodGeneratorInterface $method): void;

    /** @return list<PropertyGeneratorInterface> */
    public function properties(): array;

    public function addProperty(PropertyGeneratorInterface $property): void;

    /** @return list<TraitUseGeneratorInterface> */
    public function traitUses(): array;

    public function addTraitUse(TraitUseGeneratorInterface $traitUse): void;
}
