<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Builder;

use Ghostwriter\Filesystem\Interface\FilesystemInterface;
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
use Tests\Unit\AbstractTestCase;

use function mb_ltrim;

final readonly class TestBuilder implements TestBuilderInterface
{
    public function __construct(
        private TestMethodsResolver $testMethodsResolver,
        private FileResolver $fileResolver,
        private ClassNameNormalizer $classNameNormalizer,
        private FilesystemInterface $filesystem,
    ) {}

    #[Override]
    public function build(string $file, string $testFile): GeneratorInterface
    {
        $code = $this->filesystem->read($file);

        $tokens = PhpToken::tokenize($code);

        $namespaces = $this->fileResolver->resolve($tokens);

        $class = $this->classNameNormalizer->normalize($this->filesystem->basename($file, '.php'));

        $testClass = $this->classNameNormalizer->normalize($this->filesystem->basename($testFile, '.php'));

        foreach ($namespaces as $namespace => [$testNamespace, $namespaceGenerator]) {
            $namespaceClass = mb_ltrim($namespace . '\\' . $class, '\\');

            $testNamespaceClass = mb_ltrim($testNamespace . '\\' . $testClass, '\\');

            $namespaces[$namespace] = $namespaceGenerator->classLikes([
                $testNamespaceClass => new ClassGenerator(
                    name: $testClass,
                    extends: [new ClassNameGenerator('AbstractTestCase')],
                    attributes: [new AttributeGenerator('CoversClass', [$class . '::class'])],
                    methods: $this->testMethodsResolver->resolve($namespaceClass),
                    isFinal: true
                ),
            ])
                ->usesClass(AbstractTestCase::class)
                ->usesClass(CoversClass::class)
                ->usesClass($namespaceClass);
        }

        return FileGenerator::new($namespaces);
    }
}
