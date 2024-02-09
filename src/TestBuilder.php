<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Testify\Generator\AttributeGenerator;
use Ghostwriter\Testify\Generator\ClassGenerator;
use Ghostwriter\Testify\Generator\FileGenerator;
use Ghostwriter\Testify\Interface\BuilderInterface;
use Ghostwriter\Testify\Interface\GeneratorInterface;
use PhpToken;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use RuntimeException;

use function basename;
use function file_get_contents;

final readonly class TestBuilder implements BuilderInterface
{
    public function __construct(
        private TestMethodsResolver $testMethodsResolver,
        private FileResolver $fileResolver,
    ) {
    }

    public function build(string $file, string $testFile): GeneratorInterface
    {
        $code = file_get_contents($file);

        if ($code === false) {
            throw new RuntimeException('Could not read file: ' . $file);
        }

        $tokens = PhpToken::tokenize($code);

        $namespaces = $this->fileResolver->resolve($tokens);

        $class = basename($file, '.php');
        $testClass = basename($testFile, '.php');
        foreach ($namespaces as $namespace => [$testNamespace, $namespaceGenerator]) {
            $namespaceClass = $namespace . '\\' . $class;
            $testNamespaceClass = $testNamespace . '\\' . $testClass;
            $namespaces[$namespace] = $namespaceGenerator->classLikes([
                $testNamespaceClass => new ClassGenerator(
                    name: $testClass,
                    extends: 'TestCase',
                    methods: $this->testMethodsResolver->resolve($namespace . '\\' . $class),
                    attributes: [new AttributeGenerator('CoversClass', [$class . '::class'])],
                    isFinal: true
                ),
            ])
                ->usesClass(TestCase::class)
                ->usesClass(CoversClass::class)
                ->usesClass($namespaceClass);
        }

        return FileGenerator::new($namespaces)->declareStrictTypes();
    }
}
