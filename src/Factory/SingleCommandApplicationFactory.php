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
        $singleCommandApplication = $container->build(SingleCommandApplication::class);
        $singleCommandApplication->addArgument(
            'source',
            InputArgument::OPTIONAL,
            'The path to search for missing tests.',
            'src'
        );
        $singleCommandApplication->addArgument(
            'tests',
            InputArgument::OPTIONAL,
            'The path used to create tests.',
            'tests'
        );
        $singleCommandApplication->addOption('dry-run', 'd', InputOption::VALUE_NONE, 'Do not write any files.');
        $singleCommandApplication->addOption('force', 'f', InputOption::VALUE_NONE, 'Overwrite existing files.');
        $singleCommandApplication->setAutoExit(false);
        $singleCommandApplication->setDescription('Generate missing Tests.');
        $singleCommandApplication->setName('Testify');
        $singleCommandApplication->setVersion(InstalledVersions::getPrettyVersion('ghostwriter/testify') ?? 'UNKNOWN');
        return $singleCommandApplication;
    }
}
