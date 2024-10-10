<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container\Extension;

use Ghostwriter\Config\Contract\ConfigInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\ExtensionInterface;
use Override;

/**
 * @implements ExtensionInterface<ConfigInterface>
 */
final readonly class ConfigExtension implements ExtensionInterface
{
    /**
     * Extend a service on the given container.
     *
     * @param ConfigInterface $service
     *
     */
    #[Override]
    public function __invoke(ContainerInterface $container, object $service): ConfigInterface
    {
        global $argv;
        //        $short_opts = "df";
        //        $long_opts = [
        //            'source' => 'The path to search for missing tests.',
        //            'tests' => 'The path used to create tests.',
        //            'dry-run' => 'Whether to write the files or not',
        //            'force' => 'Whether to overwrite existing files',
        //        ];

        //        $app->setDescription('Generate missing Tests.');
        //        $app->setName('Testify');
        //        $app->setVersion(InstalledVersions::getPrettyVersion('ghostwriter/testify') ?? 'UNKNOWN');

        $rest_index = -1;
        $opts = \getopt('df', ['dry-run', 'force'], $rest_index);
        $options = \array_slice($argv, $rest_index);

        $service->set('source', $options[0] ?? 'src');
        $service->set('tests', $options[1] ?? 'tests');
        $service->set('dryRun', (
            \array_key_exists('d', $opts)
            || \array_key_exists('dry-run', $opts)
            || \in_array('-d', $options, true)
            || \in_array('--dry-run', $options, true)
        ));
        $service->set('force', (
            \array_key_exists('f', $opts)
            || \array_key_exists('force', $opts)
            || \in_array('-f', $options, true)
            || \in_array('--force', $options, true)
        ));

        return $service;
    }
}
