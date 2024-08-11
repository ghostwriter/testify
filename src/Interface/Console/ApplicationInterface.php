<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface\Console;

use Ghostwriter\Testify\Interface\CommandBusInterface;
use Ghostwriter\Testify\Interface\HandlerInterface;
use Ghostwriter\Testify\Interface\MiddlewareInterface;
use Throwable;

interface ApplicationInterface extends CommandBusInterface, HandlerInterface, MiddlewareInterface
{
    /**
     * @throws Throwable
     */
    public function run(): int;
}
