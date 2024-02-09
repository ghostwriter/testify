<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console;

use Composer\InstalledVersions;
use ErrorException;
use Ghostwriter\Container\Container;
use Ghostwriter\Testify\Command\TestifyCommand;
use Ghostwriter\Testify\ServiceProvider;
use Throwable;

use const PHP_EOL;
use const STDERR;

use function define;
use function defined;
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

    try {
        /**
         * #BlackLivesMatter.
         */
        $container = Container::getInstance();

        if (! $container->has(ServiceProvider::class)) {
            $container->provide(ServiceProvider::class);
        }

        $exitCode = $container->get(TestifyCommand::class)->run();

        exit($exitCode);
    } catch (Throwable $exception) {
        fwrite(STDERR, sprintf(
            '[%s] %s: ' . PHP_EOL . '%s',
            $exception::class,
            $exception->getMessage(),
            $exception->getTraceAsString()
        ));
    } finally {
        restore_error_handler();
    }
})($_composer_autoload_path ?? __DIR__ . '/../vendor/autoload.php');
