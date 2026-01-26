<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface\Console\Handler;

interface ErrorHandlerInterface
{
    public function handle(int $severity, string $message, string $file, int $line): void;
}
