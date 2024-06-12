<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

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

use function array_map;
use function class_exists;
use function enum_exists;
use function explode;
use function implode;
use function interface_exists;
use function ltrim;
use function mb_strrpos;
use function mb_substr;
use function sprintf;
use function str_contains;
use function str_starts_with;
use function trait_exists;

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
            $parameters = array_map(
                static function (ReflectionParameter $parameter) use ($uses): ParameterGenerator {
                    $parameterType = $parameter->getType()?->__toString() ?? 'mixed';

                    $parameterTypes = explode('|', $parameterType);
                    $types = [];
                    foreach ($parameterTypes as $type) {
                        if (str_starts_with($type, '?')) {
                            $type = ltrim($type, '?');
                        }

                        if (str_contains($type, '\\')) {
                            if (
                                class_exists($type)
                                || interface_exists($type)
                                || trait_exists($type)
                                || enum_exists($type)
                            ) {
                                $uses[$type] = new UseClassGenerator($type);
                            }

                            $type = mb_substr($type, mb_strrpos($type, '\\') + 1);
                        }

                        $types[] = $type;
                    }

                    return new ParameterGenerator(
                        name: $parameter->getName(),
                        type: implode('|', $types),
                        isOptional: $parameter->isOptional(),
                        isVariadic: $parameter->isVariadic(),
                        isPassedByReference: $parameter->isPassedByReference(),
                        isDefaultValueAvailable: $parameter->isDefaultValueAvailable(),
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

                $attributes[] = new AttributeGenerator('DataProvider', [sprintf("'%s'", $dataProvider)]);
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
