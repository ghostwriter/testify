<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\Generator\ClassLike\InterfaceGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\ConstantGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\MethodGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\UseGeneratorInterface;

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
        private array $uses = [],
        private array $extends = [],
        private array $constants = [],
        private array $methods = []
    ) {}

    public function addMethod(GeneratorInterface $method): void
    {
        $this->methods[] = $method;
    }

    public function compare(ClassLikeGeneratorInterface $other): int
    {
        return $this->name() <=> $other->name();
    }

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

    public function name(): string
    {
        return $this->name;
    }

    public function uses(): array
    {
        return $this->uses;
    }
}
