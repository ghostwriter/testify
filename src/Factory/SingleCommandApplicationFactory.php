<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Factory;

use Composer\InstalledVersions;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\FactoryInterface;
use Override;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\SingleCommandApplication;
use Throwable;

/**
 * @implements FactoryInterface<SingleCommandApplication>
 */
final readonly class SingleCommandApplicationFactory implements FactoryInterface
{
    /**
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container): SingleCommandApplication
    {
        $application = $container->build(SingleCommandApplication::class);
        $application->addArgument('source', InputArgument::OPTIONAL, 'The path to search for missing tests.', 'src');
        $application->addArgument('tests', InputArgument::OPTIONAL, 'The path used to create tests.', 'tests');
        $application->addOption('dry-run', 'd', InputOption::VALUE_NONE, 'Do not write any files.');
        $application->addOption('force', 'f', InputOption::VALUE_NONE, 'Overwrite existing files.');
        $application->setAutoExit(false);
        $application->setDescription('Generate missing Tests.');
        $application->setName('Testify');
        $application->setVersion(InstalledVersions::getPrettyVersion('ghostwriter/testify') ?? 'UNKNOWN');
        return $application;
    }
}
