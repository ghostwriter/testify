<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Builder;

use Ghostwriter\Testify\Generator\AttributeGenerator;
use Ghostwriter\Testify\Generator\ClassLike\ClassGenerator;
use Ghostwriter\Testify\Generator\FileGenerator;
use Ghostwriter\Testify\Generator\GeneratorInterface;
use Ghostwriter\Testify\Generator\Name\ClassNameGenerator;
use Ghostwriter\Testify\Normalizer\ClassNameNormalizer;
use Ghostwriter\Testify\Resolver\FileResolver;
use Ghostwriter\Testify\Resolver\TestMethodsResolver;
use Override;
use PhpToken;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use RuntimeException;

final readonly class TestBuilder implements BuilderInterface
{
    public function __construct(
        private TestMethodsResolver $testMethodsResolver,
        private FileResolver $fileResolver,
        private ClassNameNormalizer $classNameNormalizer,
    ) {
    }

    #[Override]
    public function build(string $file, string $testFile): GeneratorInterface
    {
        $code = \file_get_contents($file);

        if ($code === false) {
            throw new RuntimeException('Could not read file: ' . $file);
        }

        $tokens = PhpToken::tokenize($code);

        $namespaces = $this->fileResolver->resolve($tokens);

        $class = $this->classNameNormalizer->normalize(\basename($file, '.php'));

        $testClass = $this->classNameNormalizer->normalize(\basename($testFile, '.php'));

        foreach ($namespaces as $namespace => [$testNamespace, $namespaceGenerator]) {
            $namespaceClass = \ltrim($namespace . '\\' . $class, '\\');

            $testNamespaceClass = \ltrim($testNamespace . '\\' . $testClass, '\\');

            $namespaces[$namespace] = $namespaceGenerator->classLikes([
                $testNamespaceClass => new ClassGenerator(
                    name: $testClass,
                    extends: [new ClassNameGenerator('TestCase')],
                    methods: $this->testMethodsResolver->resolve($namespaceClass),
                    attributes: [new AttributeGenerator('CoversClass', [$class . '::class'])],
                    isFinal: true
                ),
            ])
                ->usesClass(TestCase::class)
                ->usesClass(CoversClass::class)
                ->usesClass($namespaceClass);
        }

        return FileGenerator::new($namespaces);
    }
}
