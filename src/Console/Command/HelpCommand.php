<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Command;

use Ghostwriter\Testify\Interface\CommandInterface;
use Override;

final readonly class HelpCommand implements CommandInterface
{
    #[Override]
    public function execute(): int
    {
        return 0;
    }
}
