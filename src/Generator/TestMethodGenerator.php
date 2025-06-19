<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Normalizer\TestMethodNameNormalizer;
use PhpParser\BuilderFactory;
use PhpParser\Node;

final readonly class TestMethodGenerator
{
    public function __construct(
        private BuilderFactory $builderFactory,
        private TestMethodNameNormalizer $testMethodNameNormalizer,
    ) {}

    public function __invoke(
        string $className,
        string $methodName,
        bool $isStatic,
        bool $isFinal,
        bool $isAbstract,
        bool $isPublic,
        bool $isProtected,
        bool $isPrivate,
        array $params,
        mixed $returnType,
    ): Node {
        $method = $this->builderFactory->method($this->testMethodNameNormalizer->normalize($methodName));
        if ($isStatic) {
            $method->makeStatic();
        }

        if ($isFinal) {
            $method->makeFinal();
        }

        if ($isAbstract) {
            $method->makeAbstract();
        }

        if ($isPublic) {
            $method->makePublic();
        }

        if ($isProtected) {
            $method->makeProtected();
        }

        if ($isPrivate) {
            $method->makePrivate();
        }

        if (null !== $returnType) {
            $method->setReturnType($returnType);
        }

        foreach ($params as $param) {
            $method->addParam(...$param);
        }

        return $method->getNode();
    }
}
