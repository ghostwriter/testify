<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container\Factory;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\Testify\Configuration\TestifyConfiguration;
use Override;
use Throwable;

use const DIRECTORY_SEPARATOR;

use function dirname;
use function implode;

/**
 * @see TestifyConfigurationFactoryTest
 *
 * @implements FactoryInterface<TestifyConfiguration>
 */
final readonly class TestifyConfigurationFactory implements FactoryInterface
{
    /** @throws Throwable */
    #[Override]
    public function __invoke(ContainerInterface $container): TestifyConfiguration
    {
        $testifyConfiguration = TestifyConfiguration::new();

        $testifyConfiguration->mergeDirectory(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__, 3), 'config']));

        $containerConfiguration = $testifyConfiguration->wrap('ghostwriter.container');

        foreach ($containerConfiguration->get('alias', []) as $alias => $service) {
            $container->alias($alias, $service);
        }

        foreach ($containerConfiguration->get('extend', []) as $service => $extensions) {
            foreach ($extensions as $extension) {
                $container->extend($service, $extension);
            }
        }

        foreach ($containerConfiguration->get('factory', []) as $service => $factory) {
            $container->factory($service, $factory);
        }

        return $testifyConfiguration;
    }
}
