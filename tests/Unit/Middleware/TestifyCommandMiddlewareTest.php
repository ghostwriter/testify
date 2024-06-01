<?php

declare(strict_types=1);

namespace Tests\Unit\Middleware;

use Ghostwriter\Testify\Middleware\TestifyCommandMiddleware;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestifyCommandMiddleware::class)]
final class TestifyCommandMiddlewareTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
