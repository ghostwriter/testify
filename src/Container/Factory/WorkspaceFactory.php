<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container\Factory;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\Testify\Application\Value\Workspace;
use Ghostwriter\Testify\Configuration\TestifyConfiguration;
use Override;
use Throwable;

/**
 * @implements FactoryInterface<Workspace>
 */
final readonly class WorkspaceFactory implements FactoryInterface
{
    /** @throws Throwable */
    #[Override]
    public function __invoke(ContainerInterface $container): Workspace
    {
        $configuration = $container->get(TestifyConfiguration::class);

        return Workspace::new(
            source: (string) $configuration->get('source', 'src'),
            tests: (string) $configuration->get('tests', 'tests'),
            dryRun: (bool) $configuration->get('dryRun', false),
            force: (bool) $configuration->get('force', false),
        );
    }
}
