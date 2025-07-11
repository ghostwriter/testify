<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator\ClassLike;

use Ghostwriter\Testify\Generator\ClassLikeGeneratorInterface;
use Ghostwriter\Testify\Generator\ClassLikeMember\ConstantGeneratorInterface;
use Ghostwriter\Testify\Generator\ClassLikeMember\MethodGeneratorInterface;
use Ghostwriter\Testify\Generator\ClassLikeMember\PropertyGeneratorInterface;
use Ghostwriter\Testify\Generator\ClassLikeMember\TraitUseGeneratorInterface;
use Ghostwriter\Testify\Trait\ClassLikeGeneratorTrait;
use Override;

use function array_reduce;
use function mb_rtrim;
use function usort;

final class ClassGenerator implements ClassLikeGeneratorInterface
{
    use ClassLikeGeneratorTrait;

    #[Override]
    public function generate(): string
    {
        $code = '';

        foreach ($this->dockBlocks() as $docBlockGenerator) {
            $code .= $docBlockGenerator->generate() . self::NEWLINE;
        }

        foreach ($this->attributes() as $attributeGenerator) {
            $code .= $attributeGenerator->generate() . self::NEWLINE;
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

        if ([] !== $this->extends) {
            $code .= ' extends ';

            foreach ($this->extends as $extend) {
                $code .= $extend->generate() . ', ';
            }

            $code = mb_rtrim($code, ', ');
        }

        if ([] !== $this->implements) {
            $code .= ' implements ';

            foreach ($this->implements as $implement) {
                $code .= $implement->generate() . ', ';
            }

            $code = mb_rtrim($code, ', ');
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

        return mb_rtrim($code) . self::NEWLINE . '}' . self::NEWLINE;
    }

    public function generater(): string
    {
        return array_reduce(
            $this->methods(),
            static fn (
                string $code,
                MethodGeneratorInterface $methodGenerator
            ): string => $code . $methodGenerator->generate() . self::NEWLINE,
            array_reduce(
                $this->properties(),
                static fn (
                    string $code,
                    PropertyGeneratorInterface $propertyGenerator
                ): string => $code . $propertyGenerator->generate() . self::NEWLINE,
                array_reduce(
                    $this->constants(),
                    static fn (
                        string $code,
                        ConstantGeneratorInterface $constantGenerator
                    ): string => $code . $constantGenerator->generate() . self::NEWLINE,
                    array_reduce(
                        $this->traitUses(),
                        static fn (
                            string $code,
                            TraitUseGeneratorInterface $traitUseGenerator
                        ): string => $code . $traitUseGenerator->generate() . self::NEWLINE,
                        'trait ' . $this->name . ' {' . self::NEWLINES
                    )
                )
            )
        ) . '}' . self::NEWLINE;
    }
}
