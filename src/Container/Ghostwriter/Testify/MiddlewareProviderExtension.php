<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container\Ghostwriter\Testify;

use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\Testify\Console\Provider\MiddlewareProviderInterface;
use Ghostwriter\Testify\Container\Ghostwriter\Config\ConfigurationExtension;
use Override;
use Throwable;

/**
 * @see MiddlewareProviderExtensionTest
 *
 * @implements ExtensionInterface<MiddlewareProviderInterface>
 */
final readonly class MiddlewareProviderExtension implements ExtensionInterface
{
    /**
     * Returns the provided service, unmodified.
     *
     * @param ContainerInterface          $container the container instance
     * @param MiddlewareProviderInterface $service   the service instance to be extended
     *
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container, object $service): void
    {
        $configuration = $container->get(ConfigurationInterface::class)->wrap(ConfigurationExtension::class);

        $ghostwriterTestifyConfiguration = $configuration->wrap('ghostwriter/testify', [
            'commands' => [],
            'middlewares' => [],
        ]);

        foreach ($ghostwriterTestifyConfiguration->get('middlewares', []) as $middleware) {
            foreach ($ghostwriterTestifyConfiguration->get('commands', []) as $command) {
                $service->add($command, $middleware);
            }
        }
    }
}
