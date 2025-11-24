<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\ErrorHandler;

interface ErrorHandlerInterface
{
    public function handle(int $severity, string $message, string $file, int $line): void;
}
