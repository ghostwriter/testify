<?php

declare(strict_types=1);

namespace Tests\Unit\Middleware;

use Ghostwriter\Testify\Middleware\MiddlewareProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(MiddlewareProvider::class)]
final class MiddlewareProviderTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
