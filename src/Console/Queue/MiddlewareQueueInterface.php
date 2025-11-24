<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Queue;

use Ghostwriter\Testify\Console\Handler\HandlerInterface;
use Ghostwriter\Testify\Console\Middleware\MiddlewareInterface;

interface MiddlewareQueueInterface extends HandlerInterface, MiddlewareInterface {}
