<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Feature\ErrorHandler;

interface ErrorHandlerInterface
{
    public function __invoke(int $severity, string $message, string $file, int $line): void;
}
