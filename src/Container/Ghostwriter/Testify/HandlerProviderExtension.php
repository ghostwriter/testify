<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container\Ghostwriter\Testify;

use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\Testify\Console\Provider\HandlerProviderInterface;
use Ghostwriter\Testify\Container\Ghostwriter\Config\ConfigurationExtension;
use Override;
use Throwable;

/**
 * @see HandlerProviderExtensionTest
 *
 * @implements ExtensionInterface<HandlerProviderInterface>
 */
final readonly class HandlerProviderExtension implements ExtensionInterface
{
    /**
     * Returns the provided service, unmodified.
     *
     * @param ContainerInterface       $container the container instance
     * @param HandlerProviderInterface $service   the service instance to be extended
     *
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container, object $service): void
    {
        $configuration = $container->get(ConfigurationInterface::class)->wrap(ConfigurationExtension::class);

        $ghostwriterTestifyConfiguration = $configuration->wrap('ghostwriter/testify', [
            'handlers' => [],
        ]);

        foreach ($ghostwriterTestifyConfiguration->get('handlers', []) as $command => $handler) {
            $service->add($command, $handler);
        }
    }
}
