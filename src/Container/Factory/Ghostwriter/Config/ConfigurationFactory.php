<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container\Factory\Ghostwriter\Config;

use Ghostwriter\Config\Configuration;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\FactoryInterface;
use Ghostwriter\Testify\Exception\ShouldNotHappenException;
use Override;
use RuntimeException;
use Throwable;

use const PHP_SAPI;

use function array_key_exists;
use function array_slice;
use function defined;
use function explode;
use function getopt;
use function sprintf;

/**
 * @see ConfigurationFactoryTest
 *
 * @implements FactoryInterface<Configuration>
 */
final readonly class ConfigurationFactory implements FactoryInterface
{
    /** @throws Throwable */
    #[Override]
    public function __invoke(ContainerInterface $container): Configuration
    {
        $configuration = Configuration::new();

        if ($this->isPHPUnit()) {
            return $configuration;
        }

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
            [$short, $long] = explode('|', $option);

            $type = match ($argument) {
                0 => '',
                1 => ':',
                2 => '::',
                default => throw new ShouldNotHappenException(sprintf(
                    'Invalid argument type: %s, expected 0, 1 or 2',
                    $argument,
                )),
            };

            $short_options .= $short . $type;

            $long_options[] = $long . $type;
        }

        $options = getopt($short_options, $long_options, $rest_index);

        if (false === $options) {
            throw new RuntimeException('Failed to parse options');
        }

        $configuration->set('dryRun', array_key_exists('d', $options) || array_key_exists('dry-run', $options));

        $configuration->set('force', array_key_exists('f', $options) || array_key_exists('force', $options));

        $argv = array_slice($_SERVER['argv'] ?? [], $rest_index);

        $configuration->set('source', $argv[0] ?? 'src');

        $configuration->set('tests', $argv[1] ?? 'tests');

        return $configuration;
    }

    private function isPHPUnit(): bool
    {
        return match (true) {
            PHP_SAPI === 'cli' =>  match (true) {
                defined('PHPUNIT_COMPOSER_INSTALL'),
                defined('__PHPUNIT_PHAR__') => true,
                default => false,
            },
            default => false,
        };
    }
}
