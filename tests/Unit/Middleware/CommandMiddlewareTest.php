<?php

declare(strict_types=1);

namespace Tests\Unit\Middleware;

use Ghostwriter\Testify\Middleware\CommandMiddleware;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CommandMiddleware::class)]
final class CommandMiddlewareTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
