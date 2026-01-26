<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container\Ghostwriter\Testify;

use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\Testify\Interface\Console\Provider\CommandProviderInterface;
use Override;
use Throwable;

/**
 * @see CommandProviderExtensionTest
 *
 * @implements ExtensionInterface<CommandProviderInterface>
 */
final readonly class CommandProviderExtension implements ExtensionInterface
{
    /**
     * Returns the provided service, unmodified.
     *
     * @param ContainerInterface       $container the container instance
     * @param CommandProviderInterface $service   the service instance to be extended
     *
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container, object $service): void
    {
        $ghostwriterTestifyConfiguration = $container->get(ConfigurationInterface::class)->wrap('ghostwriter/testify');
        foreach ($ghostwriterTestifyConfiguration->get('commands', []) as $command => $fullyQualifiedClassName) {
            $service->add($command, $fullyQualifiedClassName);
        }
    }
}
