<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\Generator\ClassLikeGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\NamespaceGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\UseGeneratorInterface;
use InvalidArgumentException;

use function usort;

final class NamespaceGenerator implements NamespaceGeneratorInterface
{
    /**
     * @param list<UseGeneratorInterface> $uses
     */
    public function __construct(
        private readonly string $name,
        private array $uses = [],
        private array $classLikes = [],
    ) {
    }

    public function class(
        string $name,
        string $extends = 'TestCase',
        array $methods = [],
        array $attributes = [],
        bool $isFinal = false
    ): self {
        $this->classLikes[ClassGenerator::class][$name] = new ClassGenerator(
            name: $name,
            extends: $extends,
            methods: $methods,
            attributes: $attributes,
            isFinal: $isFinal
        );

        return $this;
    }

    public function classLikes(array $classLikes): self
    {
        foreach ($classLikes as $classLike) {
            if (! ($classLike instanceof ClassLikeGeneratorInterface)) {
                throw new InvalidArgumentException('Invalid class like type');
            }
            $this->classLikes[$classLike->name()] = $classLike;
        }

        return $this;
    }

    public function generate(): string
    {
        $code = 'namespace ' . $this->name . ';' . self::NEWLINE;

        //        dd($this->classLikes);

        //        foreach ($this->getUses() as $use) {
        //            $code .= $use->generate() . self::NEWLINE;
        //        }
        //       /

        $uses = $this->uses();

        usort(
            $uses,
            static fn (
                UseGeneratorInterface $left,
                UseGeneratorInterface $right
            ): int => $left->compare($right)
        );

        //        dump($uses);

        $type = null;
        foreach ($uses as $use) {
            if ($type !== $use::class) {
                $type = $use::class;

                $code .= self::NEWLINE;
            }

            $code .= $use->generate() . self::NEWLINE;
        }

        $code .= self::NEWLINE;

        usort(
            $this->classLikes,
            static fn (
                ClassLikeGeneratorInterface $left,
                ClassLikeGeneratorInterface $right
            ): int => $left->compare($right)
        );

        foreach ($this->classLikes as $class) {
            $code .= $class->generate() . self::NEWLINES;
        }

        return $code;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function uses(): array
    {
        $uses = [];

        foreach ($this->uses as $use) {
            $uses[$use->name()] = $use;
        }

        foreach ($this->classLikes as $classLike) {
            foreach ($classLike->uses() as $use) {
                $uses[$use->name()] = $use;
            }
        }

        return $uses;
    }

    public function usesClass(string $class): self
    {
        $this->uses[$class] = new UseClassGenerator($class);

        return $this;
    }

    public function usesConstant(string $constant): self
    {
        $this->uses[$constant] = new UseConstantGenerator($constant);

        return $this;
    }

    public function usesFunction(string $function): self
    {
        $this->uses[$function] = new UseFunctionGenerator($function);

        return $this;
    }

    private function method(
        string $name,
        mixed $returnType = null,
        array $params = [],
        array $body = [],
        array $attributes = [],
        bool $isStatic = false,
        bool $isFinal = false,
        bool $isAbstract = false,
        bool $isPublic = false,
        bool $isProtected = false,
        bool $isPrivate = false,
        bool $isAnonymous = false
    ): MethodGenerator {
        return new MethodGenerator(
            name: $name,
            returnType: $returnType,
            parameters: $params,
            body: $body,
            attributes: $attributes,
            isStatic: $isStatic,
            isFinal: $isFinal,
            isAbstract: $isAbstract,
            isPublic: $isPublic,
            isProtected: $isProtected,
            isPrivate: $isPrivate,
            isAnonymous: $isAnonymous
        );
    }
}
