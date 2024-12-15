<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container\Factory;

use Ghostwriter\Config\Contract\ConfigInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\FactoryInterface;
use Ghostwriter\Testify\Value\Workspace;
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
    public function __invoke(ContainerInterface $container): object
    {
        $config = $container->get(ConfigInterface::class);

        return Workspace::new(
            source: (string) $config->get('source', 'src'),
            tests: (string) $config->get('tests', 'tests'),
            dryRun: (bool) $config->get('dryRun', false),
            force: (bool) $config->get('force', false),
        );
    }
}
