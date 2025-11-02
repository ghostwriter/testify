<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container;

use Ghostwriter\Config\Configuration;
use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\ServiceProviderInterface;
use Ghostwriter\Filesystem\Filesystem;
use Ghostwriter\Filesystem\Interface\FilesystemInterface;
use Ghostwriter\Testify\Builder\TestBuilder;
use Ghostwriter\Testify\Builder\TestBuilderInterface;
use Ghostwriter\Testify\CommandHandler\CommandHandlerProvider;
use Ghostwriter\Testify\CommandHandler\CommandHandlerProviderInterface;
use Ghostwriter\Testify\Container\Factory\ArgvFactory;
use Ghostwriter\Testify\Container\Factory\Ghostwriter\Config\ConfigurationFactory;
use Ghostwriter\Testify\Container\Factory\WorkspaceFactory;
use Ghostwriter\Testify\Feature\ErrorHandler\ErrorHandler;
use Ghostwriter\Testify\Feature\ErrorHandler\ErrorHandlerInterface;
use Ghostwriter\Testify\Feature\ExceptionHandler\ExceptionHandler;
use Ghostwriter\Testify\Feature\ExceptionHandler\ExceptionHandlerInterface;
use Ghostwriter\Testify\Middleware\MiddlewareProvider;
use Ghostwriter\Testify\Middleware\MiddlewareProviderInterface;
use Ghostwriter\Testify\Printer\CliPrinter;
use Ghostwriter\Testify\Printer\CliPrinterInterface;
use Ghostwriter\Testify\Runner\Runner;
use Ghostwriter\Testify\Runner\RunnerInterface;
use Ghostwriter\Testify\Value\Argv;
use Ghostwriter\Testify\Value\WorkspaceInterface;
use Override;
use Throwable;

final readonly class TestifyServiceProvider implements ServiceProviderInterface
{
    public const array ALIASES = [
        Configuration::class => ConfigurationInterface::class,
        Filesystem::class => FilesystemInterface::class,
        Runner::class => RunnerInterface::class,
        ErrorHandler::class => ErrorHandlerInterface::class,
        ExceptionHandler::class => ExceptionHandlerInterface::class,
        CommandHandlerProvider::class => CommandHandlerProviderInterface::class,
        MiddlewareProvider::class => MiddlewareProviderInterface::class,
        TestBuilder::class => TestBuilderInterface::class,
        CliPrinter::class => CliPrinterInterface::class,
    ];

    public const array FACTORIES = [
        Configuration::class => ConfigurationFactory::class,
        WorkspaceInterface::class => WorkspaceFactory::class,
        Argv::class => ArgvFactory::class,
    ];

    /**
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container): void
    {
        foreach (self::ALIASES as $service => $alias) {
            $container->alias($service, $alias);
        }

        foreach (self::FACTORIES as $service => $factory) {
            $container->factory($service, $factory);
        }
    }
}
