<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application;

use Ghostwriter\Testify\Command\CommandBusInterface;
use Ghostwriter\Testify\Handler\HandlerInterface;
use Ghostwriter\Testify\Middleware\MiddlewareInterface;
use Throwable;

interface ApplicationInterface extends CommandBusInterface, HandlerInterface, MiddlewareInterface
{
    /**
     * @throws Throwable
     */
    public function run(): int;
}
