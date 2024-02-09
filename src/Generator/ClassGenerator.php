<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\Generator\ClassLikeGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\ConstantGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\MethodGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\PropertyGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\TraitUseGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\NameGeneratorInterface;

use function array_map;
use function array_merge;
use function implode;
use function rtrim;
use function usort;

final class ClassGenerator implements ClassLikeGeneratorInterface
{
    public function __construct(
        private string $name,
        private string $extends = '',
        private array $attributes = [],
        private array $uses = [],
        private array $constants = [],
        private array $dockBlocks = [],
        private array $interfaces = [],
        private array $methods = [],
        private array $properties = [],
        private array $traitUses = [],
        private bool $isAbstract = false,
        private bool $isFinal = false,
        private bool $isReadonly = false,
    ) {
    }

    public function compare(ClassLikeGeneratorInterface $other): int
    {
        return $this->name() <=> $other->name();
    }

    public function generate(): string
    {
        $code = '';

        foreach ($this->dockBlocks as $dockBlock) {
            $code .= $dockBlock->generate() . self::NEWLINE;
        }

        foreach ($this->attributes as $attribute) {
            $code .= $attribute->generate() . self::NEWLINE;
        }

        if ($this->isFinal) {
            $code .= 'final ';
        }

        if ($this->isAbstract) {
            $code .= 'abstract ';
        }

        if ($this->isReadonly) {
            $code .= 'readonly ';
        }

        $code .= 'class ' . $this->name;

        if ($this->extends !== '') {
            $code .= ' extends ' . $this->extends;
        }

        if ($this->interfaces !== []) {
            $code .= ' implements ' . implode(', ', array_map(
                static fn (NameGeneratorInterface $interface): string => $interface->generate(),
                $this->interfaces
            ));
        }

        $code .= self::NEWLINE . '{' . self::NEWLINE;

        usort(
            $this->traitUses,
            static fn (
                TraitUseGeneratorInterface $left,
                TraitUseGeneratorInterface $right
            ): int => $left->compare($right)
        );

        foreach ($this->traitUses as $traitUse) {
            $code .= self::INDENT . $traitUse->generate() . self::NEWLINE;
        }

        usort(
            $this->constants,
            static fn (
                ConstantGeneratorInterface $left,
                ConstantGeneratorInterface $right
            ): int => $left->compare($right)
        );

        foreach ($this->constants as $constant) {
            $code .= self::INDENT . $constant->generate() . self::NEWLINE;
        }

        usort(
            $this->properties,
            static fn (
                PropertyGeneratorInterface $left,
                PropertyGeneratorInterface $right
            ): int => $left->compare($right)
        );

        foreach ($this->properties as $property) {
            $code .= self::INDENT . $property->generate() . self::NEWLINE;
        }

        usort(
            $this->methods,
            static fn (
                MethodGeneratorInterface $left,
                MethodGeneratorInterface $right
            ): int => $left->compare($right)
        );

        foreach ($this->methods as $method) {
            $code .= self::INDENT . $method->generate() . self::NEWLINES;
        }

        return rtrim($code) . self::NEWLINE . '}' . self::NEWLINE;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function uses(): array
    {
        $uses = $this->uses;

        foreach ($this->properties as $property) {
            $uses = array_merge($uses, $property->uses());
        }

        foreach ($this->methods as $method) {
            $uses = array_merge($uses, $method->uses());
        }

        //        dump($uses);
        return $uses;
    }
}
