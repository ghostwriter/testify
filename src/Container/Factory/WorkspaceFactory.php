<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container\Factory;

use Ghostwriter\Config\Contract\ConfigInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\FactoryInterface;
use Ghostwriter\Testify\Workspace;
use Override;
use Throwable;

/**
 * @implements FactoryInterface<Workspace>
 */
final readonly class WorkspaceFactory implements FactoryInterface
{
    /**
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container): Workspace
    {
        $config = $container->get(ConfigInterface::class);

        return new Workspace(
            source: $config->get('source'),
            tests: $config->get('tests'),
            dryRun: $config->get('dryRun'),
            force: $config->get('force'),
        );
    }
}
