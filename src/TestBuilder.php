<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Generator;
use Ghostwriter\Testify\Exception\NoNamespaceFoundException;
use Ghostwriter\Testify\NodeVisitor\ChangeToShortArrayNodeVisitor;
use Ghostwriter\Testify\NodeVisitor\HashNodeVisitor;
use Ghostwriter\Testify\NodeVisitor\ImportFullyQualifiedNamesNodeVisitor;
use Ghostwriter\Testify\NodeVisitor\SortUseStatementsAlphabeticallyNodeVisitor;
use PhpParser\BuilderFactory;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\YieldFrom;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Stmt\Declare_;
use PhpParser\Node\Stmt\DeclareDeclare;
use PhpParser\Node\Stmt\Nop;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\NodeConnectingVisitor;
use PhpParser\PrettyPrinter\Standard;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Psalm\Aliases;
use Psalm\Internal\Analyzer\ProjectAnalyzer;
use RuntimeException;

use function array_key_exists;
use function array_key_first;
use function array_key_last;
use function array_unique;
use function count;
use function explode;
use function implode;
use function ltrim;
use function mb_strpos;
use function mb_strrpos;
use function mb_substr;
use function str_contains;
use function ucfirst;

final readonly class TestBuilder
{
    private StaticCall $assertTrueStmt;

    private Declare_ $declareStrictTypes;

    private Nop $nop;

    private YieldFrom $yieldFromStmt;

    public function __construct(
        private ProjectAnalyzer $projectAnalyzer,
        private BuilderFactory $builderFactory = new BuilderFactory(),
        private Standard $printer = new Standard(),
        private NodeTraverser $traverser = new NodeTraverser(),
    ) {
        $this->assertTrueStmt = $this->builderFactory->staticCall(
            'self',
            'assertTrue',
            [$this->builderFactory->val(true)]
        );

        $array = $this->builderFactory->val([
            'example' => [true],
        ]);

        $this->yieldFromStmt = new YieldFrom($array);

        $this->declareStrictTypes = new Declare_([new DeclareDeclare('strict_types', new LNumber(1))]);

        $this->nop = new Nop();

        $this->traverser->addVisitor(new HashNodeVisitor());
        $this->traverser->addVisitor(new NodeConnectingVisitor());
        $this->traverser->addVisitor(new ImportFullyQualifiedNamesNodeVisitor());
        $this->traverser->addVisitor(new ChangeToShortArrayNodeVisitor());
        $this->traverser->addVisitor(new SortUseStatementsAlphabeticallyNodeVisitor());
    }

    public function build(string $file): string
    {
        $imports = [];
        foreach ($this->check($file) as $namespace => $classes) {
            $namespaces = explode('\\', $namespace);
            $namespaces[1] .= 'Tests\\Unit';

            $testNamespace = implode('\\', $namespaces);

            $namespaceBuilder = $this->builderFactory->namespace($testNamespace);

            foreach ($classes as $class => $classInfo) {
                $classBuilder = $this->builderFactory->class($class . 'Test')
                    ->extend('TestCase')
                    ->makeFinal()
                    ->addAttribute(
                        $this->builderFactory->attribute('CoversClass', [
                            $this->builderFactory ->classConstFetch($class, 'class'),
                        ])
                    );

                foreach ($classInfo['Methods'] ?? [] as $method => $methodInfo) {
                    $methodBuilder = $this->builderFactory->method($method)
                        ->makePublic()
                        ->setReturnType($methodInfo['return'])
                        ->addStmt($this->assertTrueStmt);

                    foreach ($methodInfo['Params'] ?? [] as $param => $type) {
                        $methodBuilder->addParam($this->builderFactory->param($param)->setType($type));
                    }

                    if (array_key_exists('dataProvider', $methodInfo)) {
                        $dataProviderName = $methodInfo['dataProvider'];

                        $classBuilder->addStmt(
                            $this->builderFactory
                                ->method($dataProviderName)
                                ->makePublic()
                                ->makeStatic()
                                ->setReturnType(Generator::class)
                                ->addStmt($this->yieldFromStmt)
                        );

                        $methodBuilder->addAttribute(
                            $this->builderFactory ->attribute('DataProvider', [$dataProviderName])
                        );
                    }

                    $classBuilder->addStmt($methodBuilder);
                }

                $methodImports = array_unique($classInfo['Imports'] ?? []);

                foreach ($methodImports as $use) {
                    if (array_key_exists($use, $imports)) {
                        continue;
                    }

                    //                    $parts = explode('\\', $use);
                    //                    $partsCount = count($parts);
                    //
                    //                    if ($partsCount > 1) {
                    //                        $alias = ucfirst($parts[array_key_first($parts)])
                    //                            . ucfirst($parts[array_key_last($parts)]);
                    //
                    //                        if (! array_key_exists($alias, $imports)) {
                    //                            $imports[$alias] = $use;
                    //                            $namespaceBuilder->addStmt($this->builderFactory->use($use) ->as($alias));
                    //
                    //                            continue;
                    //                        }
                    //                    }

                    $imports[$use] = $use;
                    $namespaceBuilder->addStmt($this->builderFactory->use($use));
                }

                $namespaceBuilder->addStmt($this->builderFactory->use($namespace . '\\' . $class));
                $namespaceBuilder->addStmt($this->nop);
                $namespaceBuilder->addStmt($classBuilder);
            }

            return $this->printer->prettyPrintFile(
                $this->traverser->traverse([
                    $this->declareStrictTypes,
                    $this->nop,
                    $namespaceBuilder->getNode(),
                    $this->nop,
                ])
            );
        }

        return '';
    }

    private function check(string $file): array
    {
        $codebase = $this->projectAnalyzer->getCodebase();

        $this->projectAnalyzer->checkFile($file);

        $codebase->addFilesToAnalyze([
            $file => $file,
        ]);

        $namespace = null;
        foreach ($codebase->file_storage_provider->get($file)->namespace_aliases as $aliases) {
            if (! $aliases instanceof Aliases) {
                continue;
            }

            $namespace = $aliases->namespace;
            if ($namespace === null) {
                continue;
            }

            break;
        }

        if ($namespace === null) {
            throw new NoNamespaceFoundException($file);
        }

        $classes = [];
        foreach ($codebase->classlike_storage_provider->getAll() as $classLikeStorage) {
            $location = $classLikeStorage->location;
            if ($location === null) {
                continue;
            }

            if ($location->file_path !== $file) {
                continue;
            }

            $fullyQualifiedClassName = $classLikeStorage->name;
            $lastSlash = mb_strrpos($fullyQualifiedClassName, '\\');
            if ($lastSlash === false) {
                continue;
            }

            $className = mb_substr($fullyQualifiedClassName, $lastSlash + 1);

            $imports = [CoversClass::class, TestCase::class];
            $methods = [];
            foreach ($classLikeStorage->methods as $methodStorage) {
                $methodName = $methodStorage->cased_name ?? throw new RuntimeException('No cased name found.');

                $casedName = ucfirst(ltrim($methodName, '_'));
                $dataProvider = 'dataProvider' . $casedName;
                $testMethodName = 'test' . $casedName;

                $methods[$testMethodName] = [
                    'Params' => [],
                    'return' => 'void',
                ];

                $params = [];
                foreach ($methodStorage->params as $methodParam) {
                    $type = $methodParam->type?->getId() ?? throw new RuntimeException('No type found.');

                    if (str_contains($type, '\\')) {
                        $imports[] = $type;
                    }

                    $position = mb_strpos($type, '<');
                    if ($position !== false) {
                        $type = mb_substr($type, 0, $position);

                        $params[$methodParam->name] = $type;

                        continue;
                    }

                    $position = mb_strpos($type, '(');
                    if ($position !== false) {
                        $type = mb_substr($type, 0, $position);

                        $params[$methodParam->name] = $type;

                        continue;
                    }

                    $params[$methodParam->name] = $type;
                }

                if ($params !== []) {
                    $methods[$testMethodName]['Params'] = $params;
                    $methods[$testMethodName]['dataProvider'] = $dataProvider;
                    $imports[] = DataProvider::class;
                    $imports[] = Generator::class;
                }
            }
            $classes[$namespace][$className]['Imports'] = array_unique($imports);
            $classes[$namespace][$className]['Methods'] = $methods;

            unset($imports, $methods, $className, $fullyQualifiedClassName, $lastSlash, $location, $params);
        }

        $codebase->invalidateInformationForFile($file);

        return $classes;
    }
}
