<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Bin;

use Ghostwriter\Testify\Console\Application;
use RuntimeException;

use const DIRECTORY_SEPARATOR;
use const E_ALL;
use const PHP_EOL;
use const STDERR;

use function date_default_timezone_set;
use function dirname;
use function fwrite;
use function implode;
use function is_file;
use function restore_error_handler;
use function set_error_handler;
use function sprintf;

(static function (array $arguments = []): never {
    date_default_timezone_set('UTC');

    set_error_handler(
        static fn (int $severity, string $message, string $filename, int $line): mixed => throw new \ErrorException(
            $message,
            255,
            $severity,
            $filename,
            $line
        ),
        E_ALL
    );

    $level = 0;
    $parent = $root = __DIR__;

    do {
        $current = $parent;

        $autoloadFile = implode(DIRECTORY_SEPARATOR, [$current, 'vendor', 'autoload.php']);
        if (! is_file($autoloadFile)) {
            $parent = dirname($root, ++$level);

            continue;
        }

        require $autoloadFile;

        restore_error_handler();

        /** #BlackLivesMatter. */
        exit(Application::new()->run($arguments));
    } while ($current !== $parent);

    throw new RuntimeException(sprintf(
        implode(
            PHP_EOL,
            [
                'Failed to locate composer autoload file.',
                'Searched up to %d levels up from %s',
                '',
                'Please run "composer install" to generate the autoload file.',
            ]
        ),
        $level,
        __DIR__
    ));
})($_SERVER['argv'] ?? []);
