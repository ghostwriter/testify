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
    public function addAttribute(AttributeGeneratorInterface $attribute): void;

    public function addConstant(ConstantGeneratorInterface $constant): void;

    public function addMethod(MethodGeneratorInterface $method): void;

    public function addProperty(PropertyGeneratorInterface $property): void;

    public function addTraitUse(TraitUseGeneratorInterface $traitUse): void;

    public function addUse(UseGeneratorInterface $use): void;

    /** @return list<AttributeGeneratorInterface> */
    public function attributes(): array;

    public function compare(self $other): int;

    /** @return list<ConstantGeneratorInterface> */
    public function constants(): array;

    /** @return list<DocBlockGeneratorInterface> */
    public function dockBlocks(): array;

    /** @return list<MethodGeneratorInterface> */
    public function methods(): array;

    public function name(): string;

    /** @return list<PropertyGeneratorInterface> */
    public function properties(): array;

    /** @return list<TraitUseGeneratorInterface> */
    public function traitUses(): array;

    /** @return list<UseGeneratorInterface> */
    public function uses(): array;
}
