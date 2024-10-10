<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Resolver;

use Generator;
use Ghostwriter\Testify\Generator\AttributeGenerator;
use Ghostwriter\Testify\Generator\ClassLikeMember\MethodGenerator;
use Ghostwriter\Testify\Generator\ParameterGenerator;
use Ghostwriter\Testify\Generator\StaticCallGenerator;
use Ghostwriter\Testify\Generator\TestDataProviderGenerator;
use Ghostwriter\Testify\Generator\Use\UseClassGenerator;
use Ghostwriter\Testify\Normalizer\TestDataProviderMethodNameNormalizer;
use Ghostwriter\Testify\Normalizer\TestMethodNameNormalizer;
use PHPUnit\Framework\Attributes\DataProvider;
use ReflectionClass;
use ReflectionMethod;
use ReflectionParameter;

final readonly class TestMethodsResolver
{
    public function __construct(
        private TestMethodNameNormalizer $testMethodNameNormalizer,
        private TestDataProviderMethodNameNormalizer $testDataProviderMethodNameNormalizer
    ) {
    }

    public function resolve(string $class): array
    {
        return [
            'testExample' => new MethodGenerator(
                name: 'testExample',
                returnType: 'void',
                body: [new StaticCallGenerator('self', 'assertTrue', ['true'])],
                isPublic: true
            ),
        ];

        $reflectionClass = new ReflectionClass($class);

        $staticCallGenerator = new StaticCallGenerator('self', 'markTestSkipped', ['Not implemented yet.']);

        $assertTrue = new StaticCallGenerator('self', 'assertTrue', ['true']);

        $methods = [
            'setUp' => new MethodGenerator('setUp', 'void', [], [], [
                $staticCallGenerator,
            ], [], false, false, false, true, false, false),
        ];

        foreach ($reflectionClass->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            $testMethodName = $this->testMethodNameNormalizer->normalize($method->getName());

            $uses = [];
            $parameters = \array_map(
                static function (ReflectionParameter $reflectionParameter) use ($uses): ParameterGenerator {
                    $parameterType = $reflectionParameter->getType()?->__toString() ?? 'mixed';

                    $parameterTypes = \explode('|', $parameterType);
                    $types = [];
                    foreach ($parameterTypes as $parameterType) {
                        if (\str_starts_with($parameterType, '?')) {
                            $parameterType = \ltrim($parameterType, '?');
                        }

                        if (\str_contains($parameterType, '\\')) {
                            if (
                                \class_exists($parameterType)
                                || \interface_exists($parameterType)
                                || \trait_exists($parameterType)
                                || \enum_exists($parameterType)
                            ) {
                                $uses[$parameterType] = new UseClassGenerator($parameterType);
                            }

                            $parameterType = \mb_substr($parameterType, \mb_strrpos($parameterType, '\\') + 1);
                        }

                        $types[] = $parameterType;
                    }

                    return new ParameterGenerator(
                        name: $reflectionParameter->getName(),
                        type: \implode('|', $types),
                        isOptional: $reflectionParameter->isOptional(),
                        isVariadic: $reflectionParameter->isVariadic(),
                        isPassedByReference: $reflectionParameter->isPassedByReference(),
                        isDefaultValueAvailable: $reflectionParameter->isDefaultValueAvailable(),
                        uses: $uses,
                    );
                },
                $method->getParameters()
            );

            $attributes = [];
            $hasParameters = $parameters !== [];
            if ($hasParameters) {
                $dataProvider = $this->testDataProviderMethodNameNormalizer->normalize($testMethodName);

                $methods[$dataProvider] = new MethodGenerator(
                    $dataProvider,
                    'Generator',
                    [new UseClassGenerator(Generator::class), new UseClassGenerator(DataProvider::class)],
                    [],
                    [new TestDataProviderGenerator($testMethodName, $parameters)],
                    $attributes,
                    true,
                    false,
                    false,
                    true,
                    false,
                    false,
                );

                $attributes[] = new AttributeGenerator('DataProvider', [\sprintf("'%s'", $dataProvider)]);
            }

            $methods[$testMethodName] = new MethodGenerator(
                $testMethodName,
                'void',
                [],
                $parameters,
                [$assertTrue],
                $attributes,
                $method->isStatic(),
                $method->isFinal(),
                $method->isAbstract(),
                $method->isPublic(),
                $method->isProtected(),
                $method->isPrivate()
            );
        }

        return $methods;
    }
}
