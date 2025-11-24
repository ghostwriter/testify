<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Provider;

use Ghostwriter\Testify\Console\Command\CommandInterface;

interface CommandProviderInterface
{
    /**
     * @param class-string<CommandInterface> $class
     */
    public function add(string $command, string $class): void;

    public function provide(string $command): CommandInterface;
}
