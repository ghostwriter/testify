<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console;

use Composer\InstalledVersions;
use ErrorException;
use Ghostwriter\Testify\Command\TestifyCommand;
use Throwable;

use const STDERR;

use function define;
use function defined;
use function dirname;
use function error_reporting;
use function file_exists;
use function fwrite;
use function ini_set;
use function restore_error_handler;
use function set_error_handler;
use function sprintf;

/** @var ?string $_composer_autoload_path */
(static function (string $composerAutoloadPath): void {
    if (! file_exists($composerAutoloadPath)) {
        fwrite(
            STDERR,
            sprintf('[ERROR]Cannot locate "%s"\n please run "composer install"\n', $composerAutoloadPath)
        );

        exit(1);
    }

    require $composerAutoloadPath;

    ini_set('memory_limit', '-1');

    if (! defined('PSALM_VERSION')) {
        define('PSALM_VERSION', InstalledVersions::getVersion('vimeo/psalm'));
    }

    if (! defined('PHP_PARSER_VERSION')) {
        define('PHP_PARSER_VERSION', InstalledVersions::getVersion('nikic/php-parser'));
    }

    set_error_handler(static function (int $severity, string $message, string $filename, int $line): bool {
        if (0 === ($severity & error_reporting())) {
            return false;
        }

        throw new ErrorException($message, 0, $severity, $filename, $line);
    });

    $exitCode = 0;
    try {
        /**
         * #BlackLivesMatter.
         */
        $exitCode = TestifyCommand::new()->run();
        //    } catch (Throwable $exception) {
        //        fwrite(STDERR, sprintf('[ERROR] %s: %s', $exception::class, $exception->getMessage()));
    } finally {
        restore_error_handler();

        exit($exitCode);
    }
})($_composer_autoload_path ?? dirname(__DIR__) . '/vendor/autoload.php');
