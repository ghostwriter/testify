<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface\Console\Provider;

use Ghostwriter\Testify\Interface\Console\CommandInterface;
use Ghostwriter\Testify\Interface\Console\MiddlewareInterface;

interface MiddlewareProviderInterface
{
    public function add(string $command, string $middleware): void;

    /**
     * @return list<MiddlewareInterface>
     */
    public function provide(CommandInterface $command): array;
}
