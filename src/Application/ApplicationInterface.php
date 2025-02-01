<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application;

use Ghostwriter\Testify\Command\CommandBusInterface;
use Throwable;

interface ApplicationInterface extends CommandBusInterface
{
    /**
     * @throws Throwable
     */
    public function run(): int;
}
