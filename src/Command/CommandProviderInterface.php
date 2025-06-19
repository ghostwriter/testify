<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Command;

interface CommandProviderInterface
{
    public function get(string $command): CommandInterface;
}
