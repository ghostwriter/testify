<?php

declare(strict_types=1);

namespace Tests\Unit\Feature\ExceptionHandler;

use Ghostwriter\Testify\Feature\ExceptionHandler\ExceptionHandlerMiddleware;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ExceptionHandlerMiddleware::class)]
final class ExceptionHandlerMiddlewareTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
