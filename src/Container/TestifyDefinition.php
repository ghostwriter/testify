<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container;

use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\DefinitionInterface;
use Ghostwriter\Testify\Container\Ghostwriter\Config\ConfigurationExtension;
use Override;
use Throwable;

/**
 * @see TestifyDefinitionTest
 */
final readonly class TestifyDefinition implements DefinitionInterface
{
    /**
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container): void
    {
        $container->extend(ConfigurationInterface::class, ConfigurationExtension::class);

        $configuration = $container->get(ConfigurationInterface::class)->wrap(ConfigurationExtension::class);

        $containerConfiguration = $configuration->wrap('ghostwriter/container', [
            'alias' => [],
            'define' => [],
            'extend' => [],
            'factory' => [],
        ]);

        foreach ($containerConfiguration->get('alias', []) as $alias => $service) {
            $container->alias($service, $alias);
        }

        foreach ($containerConfiguration->get('define', []) as $definition) {
            $container->define($definition);
        }

        foreach ($containerConfiguration->get('extend', []) as $service => $extensions) {
            foreach ($extensions as $extension) {
                $container->extend($service, $extension);
            }
        }

        foreach ($containerConfiguration->get('factory', []) as $service => $factory) {
            $container->factory($service, $factory);
        }
    }
}
