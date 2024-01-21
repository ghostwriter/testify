<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console;

use Composer\InstalledVersions;
use Ghostwriter\Testify\Command\TestifyCommand;

use const STDERR;

use function define;
use function defined;
use function dirname;
use function file_exists;
use function fwrite;
use function ini_set;
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

    /**
     * #BlackLivesMatter.
     */
    TestifyCommand::new()->run();
})($_composer_autoload_path ?? dirname(__DIR__) . '/vendor/autoload.php');
