<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Builder;

use Ghostwriter\Filesystem\Interface\FilesystemInterface;
use Ghostwriter\Testify\Application\Generator\AttributeGenerator;
use Ghostwriter\Testify\Application\Generator\ClassLike\ClassGenerator;
use Ghostwriter\Testify\Application\Generator\FileGenerator;
use Ghostwriter\Testify\Application\Generator\GeneratorInterface;
use Ghostwriter\Testify\Application\Generator\Name\ClassNameGenerator;
use Ghostwriter\Testify\Application\Generator\NamespaceGeneratorInterface;
use Ghostwriter\Testify\Application\Normalizer\ClassNameNormalizer;
use Ghostwriter\Testify\Application\Resolver\FileResolver;
use Ghostwriter\Testify\Application\Resolver\TestMethodsResolver;
use Override;
use PhpToken;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

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

        /**
         * @var array<string, array{0: string, 1: GeneratorInterface}> $namespaces
         * @var NamespaceGeneratorInterface                            $namespaceGenerator
         */
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
                ->usesClasses([
                    AbstractTestCase::class,
                    CoversClass::class,
                    $namespaceClass,
                    Override::class,
                    Throwable::class,
                ]);
        }

        return FileGenerator::new($namespaces);
    }
}
