<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application;

use Ghostwriter\Testify\Exception\ShouldNotHappenException;
use RuntimeException;
use Throwable;

use const NAN;
use const PHP_SAPI;

use function array_key_exists;
use function array_slice;
use function count;
use function defined;
use function dump;
use function explode;
use function getopt;
use function sprintf;

final readonly class ArgvParser
{
    public const int NO_ARGUMENT = 0;

    public const int OPTIONAL_ARGUMENT = 2;

    public const int REQUIRED_ARGUMENT = 1;

    /** @throws Throwable */
    public function __construct()
    {
        if ($this->isPHPUnit()) {
            return;
        }

        $short_options = '';
        $long_options = [];

        $defaults = [
            'help|h' => self::NO_ARGUMENT,
            'version|V' => self::NO_ARGUMENT,
            'dry-run|d' => self::NO_ARGUMENT,
            'force|f' => self::NO_ARGUMENT,
            'required|r' => self::REQUIRED_ARGUMENT,
            'optional|o' => self::OPTIONAL_ARGUMENT,
            //            'long' => self::OPTIONAL_ARGUMENT,
        ];
        //    0 - No colon - no argument ( boolean flag )
        //    1 - One colon - argument required ( string )
        //    2 - Two colons - argument optional ( string|null )

        foreach ($defaults as $option => $argument) {
            $explode = explode('|', $option);
            [$long, $short] = match (count($explode)) {
                2 => $explode,
                1 => [...$explode, null],
                default => throw new ShouldNotHappenException('Invalid option format, expected "long|short"'),
            };

            $short ??= '';

            match ($argument) {
                self::NO_ARGUMENT,
                self::REQUIRED_ARGUMENT,
                self::OPTIONAL_ARGUMENT => true,
                default => throw new ShouldNotHappenException(sprintf(
                    'Invalid argument type: %s, expected 0, 1 or 2',
                    $argument,
                )),
            };

            $argumentType = str_repeat(':', $argument);

            $long_options[] = $long . $argumentType;

            if ('' === $short) {
                continue;
            }

            $short_options .= $short . $argumentType;

        }

        $options = getopt($short_options, $long_options, $rest_index);

        $configuration = [];
        foreach ($defaults as $option => $argument) {
            [$long, $short] = match (count($explode)) {
                2 => $explode,
                1 => [...$explode, null],
                default => throw new ShouldNotHappenException('Invalid option format, expected "long|short"'),
            };
            $short ??= '';

            $configuration[$long] = match ($argument) {
                self::REQUIRED_ARGUMENT, self::OPTIONAL_ARGUMENT => $options[$short] ?? $options[$long] ?? NAN,
                self::NO_ARGUMENT => array_key_exists($short, $options) || array_key_exists($long, $options),
                //                self::REQUIRED_ARGUMENT => $options[$short] ?? $options[$long] ?? throw new ShouldNotHappenException(sprintf(
                //                    'Missing required argument for option: -%s|--%s',
                //                    $short,
                //                    $long,
                //                )),
                default => throw new ShouldNotHappenException(sprintf(
                    'Invalid argument type: %s, expected 0, 1 or 2',
                    $argument,
                )),
            };
        }
        //        $configuration->set('dryRun', array_key_exists('d', $options) || array_key_exists('dry-run', $options));
        //        $configuration->set('force', array_key_exists('f', $options) || array_key_exists('force', $options));
        //        $argv = array_slice($_SERVER['argv'] ?? [], $rest_index);
        //        $configuration->set('argv', $argv);
        //        $configuration->set('source', $argv[0] ?? 'src');
        //        $configuration->set('tests', $argv[1] ?? 'tests');
        if (false === $options) {
            throw new RuntimeException('Failed to parse options');
        }

        dump([$configuration, $options, array_slice($_SERVER['argv'] ?? [], $rest_index)]);
    }

    private function isPHPUnit(): bool
    {
        return match (true) {
            default => false,
            PHP_SAPI === 'cli' =>  match (true) {
                default => defined('__PHPUNIT_PHAR__'),
                defined('PHPUNIT_COMPOSER_INSTALL') => true,
            },
        };
    }
}
