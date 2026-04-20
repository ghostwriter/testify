<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface\Console;

use Throwable;

interface ApplicationInterface
{
    /** @throws Throwable */
    public function run(array $arguments = []): int;
}
