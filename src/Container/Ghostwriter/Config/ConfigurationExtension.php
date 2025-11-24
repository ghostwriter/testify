<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container\Ghostwriter\Config;

use Ghostwriter\Config\Configuration;
use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Override;
use Throwable;

use const DIRECTORY_SEPARATOR;

use function dirname;
use function implode;

/**
 * @see ListenerProviderExtensionInterfaceTest
 *
 * @implements ExtensionInterface<ConfigurationInterface>
 */
final readonly class ConfigurationExtension implements ExtensionInterface
{
    /**
     * @param ConfigurationInterface $service
     *
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container, object $service): void
    {
        $configuration = Configuration::new();

        $configuration->mergeDirectory(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__, 4), 'config']));

        $service->set(self::class, $configuration->toArray());
    }
}
