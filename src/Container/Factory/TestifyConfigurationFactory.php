<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container\Factory;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\Testify\Configuration\TestifyConfiguration;
use Override;
use RuntimeException;

use Throwable;

use const DIRECTORY_SEPARATOR;

use function dirname;
use function implode;
use function is_dir;
use function sprintf;

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

        $configurationDirectory = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__, 3), 'config']);

        if (! is_dir($configurationDirectory)) {
            throw new RuntimeException(sprintf(
                'Configuration directory "%s" does not exist',
                $configurationDirectory
            ));
        }

        $testifyConfiguration->mergeDirectory($configurationDirectory);

        return $testifyConfiguration;
    }
}
