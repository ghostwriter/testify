<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container;

use Ghostwriter\Config\Config;
use Ghostwriter\Config\Contract\ConfigInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\ServiceProviderInterface;
use Ghostwriter\Filesystem\Filesystem;
use Ghostwriter\Filesystem\Interface\FilesystemInterface;
use Ghostwriter\Testify\Builder\TestBuilder;
use Ghostwriter\Testify\Builder\TestBuilderInterface;
use Ghostwriter\Testify\CommandHandler\CommandHandlerProvider;
use Ghostwriter\Testify\CommandHandler\CommandHandlerProviderInterface;
use Ghostwriter\Testify\Container\Extension\ConfigExtension;
use Ghostwriter\Testify\Container\Factory\ArgvFactory;
use Ghostwriter\Testify\Container\Factory\WorkspaceFactory;
use Ghostwriter\Testify\Feature\ErrorHandler\ErrorHandler;
use Ghostwriter\Testify\Feature\ErrorHandler\ErrorHandlerInterface;
use Ghostwriter\Testify\Feature\ExceptionHandler\ExceptionHandler;
use Ghostwriter\Testify\Feature\ExceptionHandler\ExceptionHandlerInterface;
use Ghostwriter\Testify\Middleware\MiddlewareProvider;
use Ghostwriter\Testify\Middleware\MiddlewareProviderInterface;
use Ghostwriter\Testify\Runner\Runner;
use Ghostwriter\Testify\Runner\RunnerInterface;
use Ghostwriter\Testify\Value\Argv;
use Ghostwriter\Testify\Value\WorkspaceInterface;
use Override;
use Throwable;

final readonly class ServiceProvider implements ServiceProviderInterface
{
    public const array ALIASES = [
        Config::class => ConfigInterface::class,
        Filesystem::class => FilesystemInterface::class,
        Runner::class => RunnerInterface::class,
        ErrorHandler::class => ErrorHandlerInterface::class,
        ExceptionHandler::class => ExceptionHandlerInterface::class,
        CommandHandlerProvider::class => CommandHandlerProviderInterface::class,
        MiddlewareProvider::class => MiddlewareProviderInterface::class,
        TestBuilder::class => TestBuilderInterface::class,
    ];

    public const array EXTENSIONS = [
        ConfigInterface::class => ConfigExtension::class,
    ];

    public const array FACTORIES = [
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

        foreach (self::EXTENSIONS as $service => $extension) {
            $container->extend($service, $extension);
        }

        foreach (self::FACTORIES as $service => $factory) {
            $container->factory($service, $factory);
        }
    }
}
