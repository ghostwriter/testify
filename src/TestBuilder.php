<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Generator;
use PhpParser\BuilderFactory;
use PhpParser\Node\Expr\YieldFrom;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Stmt\Declare_;
use PhpParser\Node\Stmt\DeclareDeclare;
use PhpParser\Node\Stmt\Nop;
use PhpParser\Node\Stmt\Use_;
use PhpParser\PrettyPrinter\Standard;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

use function array_key_exists;
use function explode;
use function implode;
use function usort;

final readonly class TestBuilder
{
    public function __construct(
        private BuilderFactory $builderFactory = new BuilderFactory(),
        private Standard $printer = new Standard(),
    ) {
    }

    public function build(array $classes): string
    {
        $generatorImported = false;

        $assertTrueStmt = $this->builderFactory
            ->staticCall('self', 'assertTrue', [$this->builderFactory->val(true)]);

        $yieldFromStmt = new YieldFrom($this->builderFactory->val([
            'example' => [true],
        ]));

        $declareStrictTypes = new Declare_([new DeclareDeclare('strict_types', new LNumber(1))]);

        $nop = new Nop();
        foreach ($classes as $namespace => $classes) {
            $namespaces = explode('\\', $namespace);
            $namespaces[1] .= 'Tests\\Unit';

            $testNamespace = implode('\\', $namespaces);

            $namespaceBuilder = $this->builderFactory->namespace($testNamespace);

            foreach ($classes as $class => $methods) {
                $classBuilder = $this->builderFactory->class($class . 'Test')
                    ->extend('TestCase')
                    ->makeFinal()
                    ->addAttribute(
                        $this->builderFactory->attribute('CoversClass', [
                            $this->builderFactory ->classConstFetch($class, 'class'),
                        ])
                    );

                foreach ($methods as $method => $methodData) {
                    $methodBuilder = $this->builderFactory->method($method)
                        ->makePublic()
                        ->setReturnType($methodData['return'])
                        ->addStmt($assertTrueStmt);

                    foreach ($methodData['Params'] as $param => $type) {
                        $methodBuilder->addParam($this->builderFactory->param($param)->setType($type));
                    }

                    if (array_key_exists('dataProvider', $methodData)) {
                        $dataProviderName = $methodData['dataProvider'];
                        $classBuilder->addStmt(
                            $this->builderFactory
                                ->method($dataProviderName)
                                ->makePublic()
                                ->makeStatic()
                                ->setReturnType(Generator::class)
                                ->addStmt($yieldFromStmt)
                        );

                        $methodBuilder->addAttribute(
                            $this->builderFactory ->attribute('DataProvider', [$dataProviderName])
                        );

                        if (! $generatorImported) {
                            $generatorImported = true;
                            $namespaceBuilder->addStmt($this->builderFactory->use(Generator::class));
                        }
                    }

                    $classBuilder->addStmt($methodBuilder->getNode());
                }

                foreach ([
                    $namespace . '\\' . $class,
                    CoversClass::class,
                    DataProvider::class,
                    TestCase::class,
                ] as $use) {
                    $namespaceBuilder->addStmt($this->builderFactory->use($use));
                }

                $namespaceBuilder->addStmt($nop);
                $namespaceBuilder->addStmt($classBuilder->getNode());
            }

            $node = $namespaceBuilder->getNode();

            // sort use statements alphabetically
            usort($node->stmts, static function ($a, $b) {
                if (! $a instanceof Use_ || ! $b instanceof Use_) {
                    return -1;
                }

                return $a->uses[0]->name->toString() <=> $b->uses[0]->name->toString();
            });

            return $this->printer->prettyPrintFile([$declareStrictTypes, $nop, $node]);
        }

        return '';
    }
}
