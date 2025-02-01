<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Middleware;

use Ghostwriter\Testify\Command\CommandInterface;

interface MiddlewareProviderInterface
{
    /**
     * @return array<MiddlewareInterface>
     */
    public function get(CommandInterface $command): array;
}
