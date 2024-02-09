<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\ServiceProviderInterface;
use Ghostwriter\Testify\Interface\NormalizerInterface;
use Ghostwriter\Testify\Interface\PrinterInterface;
use Ghostwriter\Testify\Interface\RunnerInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

final readonly class ServiceProvider implements ServiceProviderInterface
{
    /**
     * @throws Throwable
     */
    public function __invoke(ContainerInterface $container): void
    {
        $container->alias(OutputInterface::class, ConsoleOutput::class);
        $container->alias(RunnerInterface::class, Runner::class);
        $container->alias(PrinterInterface::class, Printer::class);
        $container->alias(NormalizerInterface::class, TestMethodNameNormalizer::class);
    }
}
