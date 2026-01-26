<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface\Console\Middleware\Queue;

use Ghostwriter\Testify\Interface\Console\HandlerInterface;
use Ghostwriter\Testify\Interface\Console\MiddlewareInterface;

interface MiddlewareQueueInterface extends HandlerInterface, MiddlewareInterface {}
