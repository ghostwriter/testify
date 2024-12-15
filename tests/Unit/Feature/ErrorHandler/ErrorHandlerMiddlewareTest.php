<?php

declare(strict_types=1);

namespace Tests\Unit\Feature\ErrorHandler;

use Ghostwriter\Testify\Feature\ErrorHandler\ErrorHandlerMiddleware;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ErrorHandlerMiddleware::class)]
final class ErrorHandlerMiddlewareTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
