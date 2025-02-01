<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Middleware;

use Ghostwriter\Testify\CommandHandler\CommandHandlerInterface;

interface MiddlewareQueueInterface extends CommandHandlerInterface, MiddlewareInterface
{
}
