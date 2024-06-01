<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\ServiceProviderInterface;
use Ghostwriter\Testify\Factory\HandlersFactory;
use Ghostwriter\Testify\Factory\MiddlewaresFactory;
use Ghostwriter\Testify\Factory\SingleCommandApplicationFactory;
use Ghostwriter\Testify\Interface\CliPrinterInterface;
use Ghostwriter\Testify\Interface\PrinterInterface;
use Ghostwriter\Testify\Interface\RunnerInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\SingleCommandApplication;
use Throwable;

final readonly class ServiceProvider implements ServiceProviderInterface
{
    /**
     * @throws Throwable
     */
    public function __invoke(ContainerInterface $container): void
    {
        $container->alias(CliPrinterInterface::class, CliPrinter::class);
        $container->alias(OutputInterface::class, ConsoleOutput::class);
        $container->alias(PrinterInterface::class, Printer::class);
        $container->alias(RunnerInterface::class, Runner::class);
        $container->factory(Handlers::class, HandlersFactory::class);
        $container->factory(Middlewares::class, MiddlewaresFactory::class);
        $container->factory(SingleCommandApplication::class, SingleCommandApplicationFactory::class);
    }
}
