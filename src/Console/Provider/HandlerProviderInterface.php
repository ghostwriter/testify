<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Provider;

use Ghostwriter\Testify\Console\Command\CommandInterface;
use Ghostwriter\Testify\Console\Handler\HandlerInterface;

interface HandlerProviderInterface
{
    public function add(string $command, string $handler): void;

    public function provide(CommandInterface $command): HandlerInterface;
}
