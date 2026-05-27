<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Middleware;

use Ghostwriter\Testify\Console\Middleware\TestifyCommandMiddleware;
use Ghostwriter\Testify\Interface\Console\MiddlewareInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(TestifyCommandMiddleware::class)]
final class TestifyCommandMiddlewareTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleMiddlewareInterface(): void
    {
        self::assertTrue(is_a(TestifyCommandMiddleware::class, MiddlewareInterface::class, true));
    }
}
