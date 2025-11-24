<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Provider;

use Ghostwriter\Testify\Console\Command\CommandInterface;
use Ghostwriter\Testify\Console\Middleware\MiddlewareInterface;

interface MiddlewareProviderInterface
{
    public function add(string $command, string $middleware): void;

    /**
     * @return list<MiddlewareInterface>
     */
    public function provide(CommandInterface $command): array;
}
