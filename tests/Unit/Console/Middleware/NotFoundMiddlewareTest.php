<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Middleware;

use Ghostwriter\Testify\Console\Middleware\NotFoundMiddleware;
use Ghostwriter\Testify\Interface\Console\MiddlewareInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(NotFoundMiddleware::class)]
final class NotFoundMiddlewareTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleMiddlewareInterface(): void
    {
        self::assertTrue(is_a(NotFoundMiddleware::class, MiddlewareInterface::class, true));
    }
}
