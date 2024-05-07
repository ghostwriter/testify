<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\Generator\AttributeGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLike\TraitGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\ConstantGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\MethodGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\PropertyGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\TraitUseGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\UseGeneratorInterface;
use Override;

final readonly class TraitGenerator implements TraitGeneratorInterface
{
    /**
     * @param list<AttributeGeneratorInterface> $attributes
     * @param list<ConstantGeneratorInterface>  $constants
     * @param list<MethodGeneratorInterface>    $methods
     * @param list<PropertyGeneratorInterface>  $properties
     * @param list<TraitUseGeneratorInterface>  $traitUses
     * @param list<UseGeneratorInterface>       $uses
     */
    public function __construct(
        private string $name,
        private array $attributes = [],
        private array $constants = [],
        private array $methods = [],
        private array $properties = [],
        private array $traitUses = [],
        private array $uses = [],
    ) {}

    #[Override]
    public function compare(ClassLikeGeneratorInterface $other): int
    {
        return $this->name() <=> $other->name();
    }

    #[Override]
    public function generate(): string
    {
        $code = 'trait ' . $this->name . ' {' . self::NEWLINES;

        foreach ($this->traitUses as $traitUse) {
            $code .= $traitUse->generate() . self::NEWLINE;
        }

        foreach ($this->constants as $constant) {
            $code .= $constant->generate() . self::NEWLINE;
        }

        foreach ($this->properties as $property) {
            $code .= $property->generate() . self::NEWLINE;
        }

        foreach ($this->methods as $method) {
            $code .= $method->generate() . self::NEWLINE;
        }

        return $code . '}' . self::NEWLINE;
    }

    #[Override]
    public function name(): string
    {
        return $this->name;
    }

    /** @return list<UseGeneratorInterface> */
    #[Override]
    public function uses(): array
    {
        return $this->uses;
    }

    /** @return list<AttributeGeneratorInterface> */
    #[Override]
    public function attributes(): array
    {
        return $this->attributes;
    }
}
