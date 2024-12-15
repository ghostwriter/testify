<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container\Extension;

use Ghostwriter\Config\Contract\ConfigInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\ExtensionInterface;
use Ghostwriter\Testify\Exception\ShouldNotHappenException;
use Override;
use RuntimeException;

/**
 * @implements ExtensionInterface<ConfigInterface>
 */
final readonly class ConfigExtension implements ExtensionInterface
{
    /**
     * Extend a service on the given container.
     *
     * @param ConfigInterface $service
     */
    #[Override]
    public function __invoke(ContainerInterface $container, object $service): ConfigInterface
    {
        //    0 - No colon - no argument ( boolean flag )
        //    1 - One colon - argument required ( string )
        //    2 - Two colons - argument optional ( string|null )

        $short_options = '';
        $long_options = [];
        $defaults = [
            'h|help' => 0,
            'V|version' => 0,
            'd|dry-run' => 0,
            'f|force' => 0,
            'r|required' => 1,
            'o|optional' => 2,
        ];

        foreach ($defaults as $option => $argument) {
            [$short, $long] = \explode('|', $option);

            $type = match ($argument) {
                0 => '',
                1 => ':',
                2 => '::',
                default => throw new ShouldNotHappenException(\sprintf(
                    'Invalid argument type: %s, expected 0, 1 or 2',
                    $argument,
                )),
            };

            $short_options .= $short . $type;

            $long_options[] = $long . $type;
        }

        $options = \getopt($short_options, $long_options, $rest_index);

        if ($options === false) {
            throw new RuntimeException('Failed to parse options');
        }

        $service->set('dryRun', \array_key_exists('d', $options) || \array_key_exists('dry-run', $options));

        $service->set('force', \array_key_exists('f', $options) || \array_key_exists('force', $options));

        $argv = \array_slice($_SERVER['argv'] ?? [], $rest_index);

        $service->set('source', $argv[0] ?? 'src');

        $service->set('tests', $argv[1] ?? 'tests');

        return $service;
    }

    private function highlight(string $thing): string
    {
        return \sprintf("\x1B[1;32m%s\x1B[0m", $thing);
    }
}
