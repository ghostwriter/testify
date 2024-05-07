<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\Generator\ClassLike\TraitGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\ConstantGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\MethodGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\PropertyGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\TraitUseGeneratorInterface;
use Override;

final readonly class TraitGenerator implements TraitGeneratorInterface
{
    /**
     * @param array<ConstantGeneratorInterface> $constants
     * @param array<PropertyGeneratorInterface> $properties
     * @param array<MethodGeneratorInterface>   $methods
     * @param array<TraitUseGeneratorInterface> $traitUses
     */
    public function __construct(
        private string $name,
        private array $uses = [],
        private array $constants = [],
        private array $properties = [],
        private array $methods = [],
        private array $traitUses = [],
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

    #[Override]
    public function uses(): array
    {
        return $this->uses;
    }
}
