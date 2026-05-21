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
use Ghostwriter\Testify\Console\Command\TestifyCommand;
use Ghostwriter\Testify\Console\ExceptionHandler\ExceptionHandler;
use Ghostwriter\Testify\Console\Handler\TestifyHandler;
use Ghostwriter\Testify\Console\Middleware\ErrorHandlerMiddleware;
use Ghostwriter\Testify\Console\Middleware\ExceptionHandlerMiddleware;
use Ghostwriter\Testify\Console\Provider\CommandProvider;
use Ghostwriter\Testify\Console\Provider\HandlerProvider;
use Ghostwriter\Testify\Console\Provider\MiddlewareProvider;
use Ghostwriter\Testify\Console\Queue\MiddlewareQueue;
use Ghostwriter\Testify\Container\Extension\CommandProviderExtension;
use Ghostwriter\Testify\Container\Extension\HandlerProviderExtension;
use Ghostwriter\Testify\Container\Extension\MiddlewareProviderExtension;
use Ghostwriter\Testify\Container\Factory\TestifyConfigurationFactory;
use Ghostwriter\Testify\Container\Factory\WorkspaceFactory;
use Ghostwriter\Testify\Container\TestifyProvider;
use Ghostwriter\Testify\Interface\Console\ApplicationInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversTrait;
use PHPUnit\Framework\TestCase;
use Throwable;

#[CoversClass(Application::class)]
#[CoversClass(AttributeGenerator::class)]
#[CoversClass(ClassGenerator::class)]
#[CoversClass(ClassMethodNameNormalizer::class)]
#[CoversClass(ClassNameNormalizer::class)]
#[CoversClass(CliPrinter::class)]
#[CoversClass(CommandProvider::class)]
#[CoversClass(CommandProviderExtension::class)]
#[CoversClass(DeclareStrictTypesGenerator::class)]
#[CoversClass(ErrorHandlerMiddleware::class)]
#[CoversClass(ExceptionHandler::class)]
#[CoversClass(ExceptionHandlerMiddleware::class)]
#[CoversClass(FileGenerator::class)]
#[CoversClass(FileResolver::class)]
#[CoversClass(HandlerProvider::class)]
#[CoversClass(HandlerProviderExtension::class)]
#[CoversClass(MethodGenerator::class)]
#[CoversClass(MiddlewareProvider::class)]
#[CoversClass(MiddlewareProviderExtension::class)]
#[CoversClass(MiddlewareQueue::class)]
#[CoversClass(NamespaceGenerator::class)]
#[CoversClass(PhpFileFinder::class)]
#[CoversClass(Runner::class)]
#[CoversClass(StaticCallGenerator::class)]
#[CoversClass(TestBuilder::class)]
#[CoversClass(TestDataProviderMethodNameNormalizer::class)]
#[CoversClass(TestifyCommand::class)]
#[CoversClass(TestifyConfigurationFactory::class)]
#[CoversClass(TestifyHandler::class)]
#[CoversClass(TestifyProvider::class)]
#[CoversClass(TestMethodNameNormalizer::class)]
#[CoversClass(TestMethodsResolver::class)]
#[CoversClass(TestNamespaceResolver::class)]
#[CoversClass(UseClassGenerator::class)]
#[CoversClass(Workspace::class)]
#[CoversClass(WorkspaceFactory::class)]
#[CoversTrait(NameGeneratorTrait::class)]
final class ApplicationTest extends TestCase
{
    /** @throws Throwable */
    public function testApplication(): void
    {
        $application = Application::new();

        self::assertInstanceOf(ApplicationInterface::class, $application);

        self::assertInstanceOf(Application::class, $application);
    }
}
