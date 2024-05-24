<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator\ClassLike;

use Ghostwriter\Testify\Interface\Generator\ClassLike\TraitGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\ConstantGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\MethodGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\PropertyGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\TraitUseGeneratorInterface;
use Ghostwriter\Testify\Trait\ClassLikeGeneratorTrait;
use Override;

final class TraitGenerator implements TraitGeneratorInterface
{
    use ClassLikeGeneratorTrait;

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
