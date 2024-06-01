<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator\ClassLike;

use Ghostwriter\Testify\Interface\Generator\ClassLike\InterfaceGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\ConstantGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\MethodGeneratorInterface;
use Ghostwriter\Testify\Interface\GeneratorInterface;
use Ghostwriter\Testify\Trait\ClassLikeGeneratorTrait;
use Override;

use function array_reduce;

final class InterfaceGenerator implements InterfaceGeneratorInterface
{
    use ClassLikeGeneratorTrait;

    #[Override]
    public function addMethod(GeneratorInterface $method): void
    {
        $this->methods[] = $method;
    }

    #[Override]
    public function generate(): string
    {
        $code = 'interface ' . $this->name;

        if ($this->extends !== []) {
            $code .= ' extends ';
            //. implode(', ', $this->extends);

            foreach ($this->extends as $extend) {
                $code .= $extend->generate() . ', ';
            }
        }

        $code .= self::NEWLINE . '{' . self::NEWLINES;

        foreach ($this->constants as $constant) {
            if (! $constant instanceof ConstantGeneratorInterface) {
                continue;
            }

            $code .= $constant->generate() . self::NEWLINES;
        }

        $methods = array_reduce($this->methods, static function (array $methods, GeneratorInterface $method): array {
            if ($method instanceof MethodGeneratorInterface) {
                $methods[] = $method;
            }

            return $methods;
        }, []);

        foreach ($methods as $method) {
            if (! $method instanceof MethodGeneratorInterface) {
                continue;
            }

            $code .= $method->generate() . self::NEWLINES;
        }

        return $code . '}' . self::NEWLINE;
    }
}
