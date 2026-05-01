<?php

declare(strict_types=1);

use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\Testify\Application\Builder\TestBuilder;
use Ghostwriter\Testify\Application\Builder\TestBuilderInterface;
use Ghostwriter\Testify\Application\Printer\CliPrinter;
use Ghostwriter\Testify\Application\Printer\CliPrinterInterface;
use Ghostwriter\Testify\Application\Runner\Runner;
use Ghostwriter\Testify\Application\Runner\RunnerInterface;
use Ghostwriter\Testify\Application\Value\Argv;
use Ghostwriter\Testify\Application\Value\WorkspaceInterface;
use Ghostwriter\Testify\Configuration\TestifyConfiguration;
use Ghostwriter\Testify\Console\ErrorHandler\ErrorHandler;
use Ghostwriter\Testify\Console\ExceptionHandler\ExceptionHandler;
use Ghostwriter\Testify\Console\Provider\CommandProvider;
use Ghostwriter\Testify\Console\Provider\HandlerProvider;
use Ghostwriter\Testify\Console\Provider\MiddlewareProvider;
use Ghostwriter\Testify\Container\Extension\CommandProviderExtension;
use Ghostwriter\Testify\Container\Extension\HandlerProviderExtension;
use Ghostwriter\Testify\Container\Extension\MiddlewareProviderExtension;
use Ghostwriter\Testify\Container\Factory\ArgvFactory;
use Ghostwriter\Testify\Container\Factory\TestifyConfigurationFactory;
use Ghostwriter\Testify\Container\Factory\WorkspaceFactory;
use Ghostwriter\Testify\Interface\Console\Handler\ErrorHandlerInterface;
use Ghostwriter\Testify\Interface\Console\Handler\ExceptionHandlerInterface;
use Ghostwriter\Testify\Interface\Console\Provider\CommandProviderInterface;
use Ghostwriter\Testify\Interface\Console\Provider\HandlerProviderInterface;
use Ghostwriter\Testify\Interface\Console\Provider\MiddlewareProviderInterface;

/**
 * @return array{
 *     'alias': array<class-string,class-string>,
 *     'extend': array<class-string,list<class-string<ExtensionInterface>>>,
 *     'factory': array<class-string,class-string<FactoryInterface>>
 * }
 */
return [
    'alias' => [
        CliPrinterInterface::class => CliPrinter::class,
        CommandProviderInterface::class => CommandProvider::class,
        ErrorHandlerInterface::class => ErrorHandler::class,
        ExceptionHandlerInterface::class => ExceptionHandler::class,
        HandlerProviderInterface::class => HandlerProvider::class,
        MiddlewareProviderInterface::class => MiddlewareProvider::class,
        RunnerInterface::class => Runner::class,
        TestBuilderInterface::class => TestBuilder::class,
    ],
    'extend' => [
        CommandProviderInterface::class => [CommandProviderExtension::class],
        HandlerProviderInterface::class => [HandlerProviderExtension::class],
        MiddlewareProviderInterface::class => [MiddlewareProviderExtension::class],
    ],
    'factory' => [
        TestifyConfiguration::class => TestifyConfigurationFactory::class,
        WorkspaceInterface::class => WorkspaceFactory::class,
        Argv::class => ArgvFactory::class,
    ],
];
