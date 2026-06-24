<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Generator;

use Ghostwriter\Testify\Application\Generator\ClassLikeMember\MethodGeneratorInterface;
use Ghostwriter\Testify\Application\Generator\Use\UseGeneratorInterface;

interface NamespaceGeneratorInterface extends GeneratorInterface
{
    public function class(
        string $name,
        string $extends = 'TestCase',
        array $methods = [],
        array $attributes = [],
        bool $isFinal = false
    ): self;

    public function classLikes(array $classLikes): self;

    public function method(
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
    ): MethodGeneratorInterface;

    public function name(): string;

    /** @return array<string,UseGeneratorInterface> */
    public function uses(): array;

    public function usesClass(string $class): self;

    public function usesClasses(array $classes = []): self;

    public function usesConstant(string $constant): self;

    public function usesFunction(string $function): self;
}
