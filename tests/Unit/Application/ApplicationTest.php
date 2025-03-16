<?php

declare(strict_types=1);

namespace Tests\Unit\Application;

use Generator;
use Ghostwriter\Testify\Application\Application;
use Ghostwriter\Testify\Application\ApplicationInterface;
use Ghostwriter\Testify\Application\PhpFileFinder;
use Ghostwriter\Testify\Builder\TestBuilder;
use Ghostwriter\Testify\CommandHandler\CommandHandlerProvider;
use Ghostwriter\Testify\Container\Extension\ConfigExtension;
use Ghostwriter\Testify\Container\Factory\WorkspaceFactory;
use Ghostwriter\Testify\Container\ServiceProvider;
use Ghostwriter\Testify\Feature\ErrorHandler\ErrorHandlerMiddleware;
use Ghostwriter\Testify\Feature\ExceptionHandler\ExceptionHandler;
use Ghostwriter\Testify\Feature\ExceptionHandler\ExceptionHandlerMiddleware;
use Ghostwriter\Testify\Feature\Testify\TestifyCommand;
use Ghostwriter\Testify\Feature\Testify\TestifyCommandHandler;
use Ghostwriter\Testify\Generator\AttributeGenerator;
use Ghostwriter\Testify\Generator\ClassLike\ClassGenerator;
use Ghostwriter\Testify\Generator\ClassLikeMember\MethodGenerator;
use Ghostwriter\Testify\Generator\DeclareStrictTypesGenerator;
use Ghostwriter\Testify\Generator\FileGenerator;
use Ghostwriter\Testify\Generator\NamespaceGenerator;
use Ghostwriter\Testify\Generator\StaticCallGenerator;
use Ghostwriter\Testify\Generator\Use\UseClassGenerator;
use Ghostwriter\Testify\Middleware\MiddlewareProvider;
use Ghostwriter\Testify\Middleware\MiddlewareQueue;
use Ghostwriter\Testify\Normalizer\ClassMethodNameNormalizer;
use Ghostwriter\Testify\Normalizer\ClassNameNormalizer;
use Ghostwriter\Testify\Normalizer\TestDataProviderMethodNameNormalizer;
use Ghostwriter\Testify\Normalizer\TestMethodNameNormalizer;
use Ghostwriter\Testify\Printer\CliPrinter;
use Ghostwriter\Testify\Resolver\FileResolver;
use Ghostwriter\Testify\Resolver\TestMethodsResolver;
use Ghostwriter\Testify\Resolver\TestNamespaceResolver;
use Ghostwriter\Testify\Runner\Runner;
use Ghostwriter\Testify\Trait\NameGeneratorTrait;
use Ghostwriter\Testify\Value\Workspace;
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
#[CoversClass(CommandHandlerProvider::class)]
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
#[CoversClass(ServiceProvider::class)]
#[CoversClass(StaticCallGenerator::class)]
#[CoversClass(TestBuilder::class)]
#[CoversClass(TestDataProviderMethodNameNormalizer::class)]
#[CoversClass(TestMethodNameNormalizer::class)]
#[CoversClass(TestMethodsResolver::class)]
#[CoversClass(TestNamespaceResolver::class)]
#[CoversClass(TestifyCommand::class)]
#[CoversClass(TestifyCommandHandler::class)]
#[CoversClass(UseClassGenerator::class)]
#[CoversClass(Workspace::class)]
#[CoversClass(ConfigExtension::class)]
#[CoversClass(WorkspaceFactory::class)]
#[CoversTrait(NameGeneratorTrait::class)]
final class ApplicationTest extends TestCase
{
    /**
     * @throws Throwable
     */
    #[DataProvider('argvDataProvider')]
    public function testApplication(array $arguments, int $expectedExitCode = 0): void
    {
        $application = Application::new();

        self::assertInstanceOf(ApplicationInterface::class, $application);

        self::assertInstanceOf(Application::class, $application);

        self::assertSame($expectedExitCode, $application->run($arguments));
    }

    public function testExample(): void
    {
        self::assertTrue(true);
    }

    /**
     * @throws Throwable
     */
    public static function argvDataProvider(): Generator
    {
        yield 'empty' => [[]];
        yield 'with arguments' => [['--help']];
        yield 'argv' => [$_SERVER['argv']];
    }
}
