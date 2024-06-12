<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console;

use Ghostwriter\Testify\Testify;

use const STDERR;

use function file_exists;
use function fwrite;
use function sprintf;

/** @var ?string $_composer_autoload_path */
(static function (string $composerAutoloadPath): never {
    if (! file_exists($composerAutoloadPath)) {
        fwrite(
            STDERR,
            sprintf('[ERROR]Cannot locate "%s"\n please run "composer install"\n', $composerAutoloadPath)
        );

        exit(1);
    }

    require $composerAutoloadPath;

    /**
     * #BlackLivesMatter.
     */
    exit(Testify::new()->run());
})($_composer_autoload_path ?? __DIR__ . '/../vendor/autoload.php');
