<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface\Console\Provider;

use Ghostwriter\Testify\Interface\Console\CommandInterface;
use Ghostwriter\Testify\Interface\Console\HandlerInterface;

interface HandlerProviderInterface
{
    public function add(string $command, string $handler): void;

    public function provide(CommandInterface $command): HandlerInterface;
}
