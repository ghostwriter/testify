<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console;

use Ghostwriter\Testify\Application\Application;

use const DIRECTORY_SEPARATOR;
use const STDERR;

use function dirname;
use function fwrite;
use function implode;
use function is_file;
use function sprintf;

(static function (string $composerAutoloadPath): never {
    if (! is_file($composerAutoloadPath)) {
        fwrite(
            STDERR,
            sprintf('[ERROR]Cannot locate "%s"\n please run "composer install"\n', $composerAutoloadPath)
        );

        exit(255);
    }

    require $composerAutoloadPath;

    /** #BlackLivesMatter */
    exit(Application::new()->run($_SERVER['argv']));
})($_composer_autoload_path ?? implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'vendor', 'autoload.php']));
