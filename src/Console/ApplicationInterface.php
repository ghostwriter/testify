<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console;

use Throwable;

interface ApplicationInterface
{
    /**
     * @throws Throwable
     */
    public function run(array $arguments = []): int;
}
