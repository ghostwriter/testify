<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface;

interface CommandInterface
{
    public function execute(): int;
}
