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

final class TraitGenerator implements TraitGeneratorInterface
{
    use ClassLikeGeneratorTrait;

    #[Override]
    public function compare(ClassLikeGeneratorInterface $classLikeGenerator): int
    {
        return $this->name() <=> $classLikeGenerator->name();
    }

    #[Override]
    public function generate(): string
    {
        $code = 'trait ' . $this->name . ' {' . self::NEWLINES;

        foreach ($this->traitUses as $traitUse) {
            if (! $traitUse instanceof TraitUseGeneratorInterface) {
                continue;
            }

            $code .= $traitUse->generate() . self::NEWLINES;
        }

        foreach ($this->constants as $constant) {
            if (! $constant instanceof ConstantGeneratorInterface) {
                continue;
            }

            $code .= $constant->generate() . self::NEWLINES;
        }

        foreach ($this->properties as $property) {
            if (! $property instanceof PropertyGeneratorInterface) {
                continue;
            }

            $code .= $property->generate() . self::NEWLINES;
        }

        foreach ($this->methods as $method) {
            if (! $method instanceof MethodGeneratorInterface) {
                continue;
            }

            $code .= $method->generate() . self::NEWLINES;
        }

        return $code . '}' . self::NEWLINE;
    }
}
