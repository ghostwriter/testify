<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\CommandHandler;

use Ghostwriter\Testify\Command\CommandInterface;

interface CommandHandlerProviderInterface
{
    public function get(CommandInterface $command): CommandHandlerInterface;
}
