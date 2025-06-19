<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Generator\ClassLike\ClassGenerator;
use Ghostwriter\Testify\Generator\ClassLikeMember\MethodGenerator;
use Ghostwriter\Testify\Generator\Use\UseClassGenerator;
use Ghostwriter\Testify\Generator\Use\UseConstantGenerator;
use Ghostwriter\Testify\Generator\Use\UseFunctionGenerator;
use Ghostwriter\Testify\Generator\Use\UseGeneratorInterface;
use InvalidArgumentException;
use Override;

use function array_reduce;
use function usort;

final class NamespaceGenerator implements NamespaceGeneratorInterface
{
    /**
     * @param UseGeneratorInterface                                                                      $uses
     * @param array<class-string<ClassLikeGeneratorInterface>,array<string,ClassLikeGeneratorInterface>> $classLikes
     */
    public function __construct(
        private readonly string $name,
        private array $uses = [],
        private array $classLikes = [],
    ) {}

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
            attributes: $attributes,
            methods: $methods,
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

    #[Override]
    public function generate(): string
    {
        $code = 'namespace ' . $this->name . ';' . self::NEWLINE;

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

        $classLikes = $this->classLikes;

        usort(
            $classLikes,
            static fn (
                ClassLikeGeneratorInterface $left,
                ClassLikeGeneratorInterface $right
            ): int => $left->compare($right)
        );

        //        foreach ($classLikes as $class) {
        //            $code .= $class->generate() . self::NEWLINES;
        //        }

        //        return $code;

        return array_reduce(
            $classLikes,
            static fn (string $code, ClassLikeGeneratorInterface $classLikeGenerator): string => $code . $classLikeGenerator->generate() . self::NEWLINES,
            $code
        );
    }

    #[Override]
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return array<string,UseGeneratorInterface>
     */
    public function uses(): array
    {
        /** @var array<string,UseGeneratorInterface> $uses */
        $uses = [];

        foreach ($this->uses as $use) {
            $uses[$use->name()] = $use;
        }

        foreach ($this->classLikes as $name => $classLike) {
            if (! ($classLike instanceof ClassLikeGeneratorInterface)) {
                continue;
            }

            foreach ($classLike->uses() as $use) {
                $uses[$use->name()] = $use;
            }
        }

        /** @var array<string,UseGeneratorInterface> $uses */
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
