<?php

declare(strict_types=1);

namespace Tests\Unit\Application;

use Ghostwriter\Testify\Application\Builder\TestBuilder;
use Ghostwriter\Testify\Application\Generator\AttributeGenerator;
use Ghostwriter\Testify\Application\Generator\ClassLike\ClassGenerator;
use Ghostwriter\Testify\Application\Generator\ClassLikeMember\MethodGenerator;
use Ghostwriter\Testify\Application\Generator\DeclareStrictTypesGenerator;
use Ghostwriter\Testify\Application\Generator\FileGenerator;
use Ghostwriter\Testify\Application\Generator\NamespaceGenerator;
use Ghostwriter\Testify\Application\Generator\StaticCallGenerator;
use Ghostwriter\Testify\Application\Generator\Use\UseClassGenerator;
use Ghostwriter\Testify\Application\Normalizer\ClassMethodNameNormalizer;
use Ghostwriter\Testify\Application\Normalizer\ClassNameNormalizer;
use Ghostwriter\Testify\Application\Normalizer\TestDataProviderMethodNameNormalizer;
use Ghostwriter\Testify\Application\Normalizer\TestMethodNameNormalizer;
use Ghostwriter\Testify\Application\PhpFileFinder;
use Ghostwriter\Testify\Application\Printer\CliPrinter;
use Ghostwriter\Testify\Application\Resolver\FileResolver;
use Ghostwriter\Testify\Application\Resolver\TestMethodsResolver;
use Ghostwriter\Testify\Application\Resolver\TestNamespaceResolver;
use Ghostwriter\Testify\Application\Runner\Runner;
use Ghostwriter\Testify\Application\Trait\NameGeneratorTrait;
use Ghostwriter\Testify\Application\Value\Workspace;
use Ghostwriter\Testify\Console\Application;
use Ghostwriter\Testify\Console\ApplicationInterface;
use Ghostwriter\Testify\Console\Command\TestifyCommand;
use Ghostwriter\Testify\Console\ExceptionHandler\ExceptionHandler;
use Ghostwriter\Testify\Console\Handler\TestifyHandler;
use Ghostwriter\Testify\Console\Middleware\ErrorHandlerMiddleware;
use Ghostwriter\Testify\Console\Middleware\ExceptionHandlerMiddleware;
use Ghostwriter\Testify\Console\Provider\HandlerProvider;
use Ghostwriter\Testify\Console\Provider\MiddlewareProvider;
use Ghostwriter\Testify\Console\Queue\MiddlewareQueue;
use Ghostwriter\Testify\Container\Ghostwriter\Testify\WorkspaceFactory;
use Iterator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversTrait;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Throwable;

#[CoversClass(Application::class)]
#[CoversClass(AttributeGenerator::class)]
#[CoversClass(ClassGenerator::class)]
#[CoversClass(ClassMethodNameNormalizer::class)]
#[CoversClass(ClassNameNormalizer::class)]
#[CoversClass(CliPrinter::class)]
#[CoversClass(HandlerProvider::class)]
#[CoversClass(DeclareStrictTypesGenerator::class)]
#[CoversClass(ErrorHandlerMiddleware::class)]
#[CoversClass(ExceptionHandler::class)]
#[CoversClass(ExceptionHandlerMiddleware::class)]
#[CoversClass(FileGenerator::class)]
#[CoversClass(FileResolver::class)]
#[CoversClass(MethodGenerator::class)]
#[CoversClass(MiddlewareProvider::class)]
#[CoversClass(MiddlewareQueue::class)]
#[CoversClass(NamespaceGenerator::class)]
#[CoversClass(PhpFileFinder::class)]
#[CoversClass(Runner::class)]
#[CoversClass(StaticCallGenerator::class)]
#[CoversClass(TestBuilder::class)]
#[CoversClass(TestDataProviderMethodNameNormalizer::class)]
#[CoversClass(TestMethodNameNormalizer::class)]
#[CoversClass(TestMethodsResolver::class)]
#[CoversClass(TestNamespaceResolver::class)]
#[CoversClass(TestifyCommand::class)]
#[CoversClass(TestifyHandler::class)]
#[CoversClass(UseClassGenerator::class)]
#[CoversClass(Workspace::class)]
#[CoversClass(ConfigurationFactory::class)]
#[CoversClass(WorkspaceFactory::class)]
#[CoversTrait(NameGeneratorTrait::class)]
final class ApplicationTest extends TestCase
{
    /**
     * @throws Throwable
     */
    #[DataProvider('provideApplicationCases')]
    public function testApplication(array $arguments, int $expectedExitCode = 0): void
    {
        $application = Application::new();

        self::assertInstanceOf(ApplicationInterface::class, $application);

        self::assertInstanceOf(Application::class, $application);

        self::assertSame($expectedExitCode, $application->run($arguments));
    }

    /**
     * @throws Throwable
     *
     * @return Iterator<array<int, mixed>>
     */
    public static function provideApplicationCases(): iterable
    {
        yield 'empty' => [[]];
        yield 'with arguments' => [['--help']];
        yield 'argv' => [$_SERVER['argv']];
    }
}
