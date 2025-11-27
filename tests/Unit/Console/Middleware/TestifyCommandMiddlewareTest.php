<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Middleware;

use Ghostwriter\Testify\Console\Middleware\TestifyCommandMiddleware;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(TestifyCommandMiddleware::class)]
final class TestifyCommandMiddlewareTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
