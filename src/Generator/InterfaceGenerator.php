<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\Generator\AttributeGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLike\InterfaceGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\ConstantGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\MethodGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\UseGeneratorInterface;
use Ghostwriter\Testify\Interface\GeneratorInterface;
use Override;

use function implode;

final class InterfaceGenerator implements InterfaceGeneratorInterface
{
    /**
     * @param list<UseGeneratorInterface>      $uses
     * @param list<string>                     $extends
     * @param list<ConstantGeneratorInterface> $constants
     * @param list<MethodGeneratorInterface>   $methods
     */
    public function __construct(
        private string $name,
        private array $attributes = [],
        private array $constants = [],
        private array $extends = [],
        private array $methods = [],
        private array $uses = [],
    ) {}

    public function addMethod(GeneratorInterface $method): void
    {
        $this->methods[] = $method;
    }

    #[Override]
    public function compare(ClassLikeGeneratorInterface $other): int
    {
        return $this->name() <=> $other->name();
    }

    #[Override]
    public function generate(): string
    {
        $newLine = "\n";
        $newLines = "\n\n";

        $code = 'interface ' . $this->name;

        if ($this->extends !== []) {
            $code .= ' extends ' . implode(', ', $this->extends);
        }

        $code .= $newLine . '{' . $newLines;

        foreach ($this->constants as $constant) {
            if (! $constant instanceof ConstantGeneratorInterface) {
                continue;
            }

            $code .= $constant->generate() . $newLines;
        }

        foreach ($this->methods as $method) {
            if (! $method instanceof MethodGeneratorInterface) {
                continue;
            }

            $code .= $method->generate() . $newLines;
        }

        return $code . '}' . $newLine;
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

    /** @return list<AttributeGeneratorInterface> */
    #[Override]
    public function attributes(): array
    {
        return $this->attributes;
    }
}
