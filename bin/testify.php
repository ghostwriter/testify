<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Bin;

use ErrorException;
use Ghostwriter\Testify\Console\Application;
use RuntimeException;

use const DIRECTORY_SEPARATOR;
use const E_ALL;
use const PHP_EOL;

use function date_default_timezone_set;
use function dirname;
use function implode;
use function is_file;
use function restore_error_handler;
use function set_error_handler;
use function sprintf;

(static function (array $arguments, string $autoloadFile): never {
    if (! is_file($autoloadFile)) {
        throw new RuntimeException(sprintf(
            implode(
                PHP_EOL,
                [
                    'Failed to locate composer autoload file.',
                    'Searched for %s',
                    '',
                    'Please run "composer install" to generate the autoload file.',
                ]
            ),
            $autoloadFile
        ));
    }

    set_error_handler(
        static fn (int $severity, string $message, string $filename, int $line): mixed => throw new ErrorException(
            $message,
            255,
            $severity,
            $filename,
            $line
        ),
        E_ALL
    );

    require $autoloadFile;

    restore_error_handler();

    date_default_timezone_set('UTC');

    /** #BlackLivesMatter. */
    exit(Application::new()->run($arguments));
})(
    $_SERVER['argv'] ??= [],
    $GLOBALS['_composer_autoload_path'] ??= implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'vendor', 'autoload.php'])
);
