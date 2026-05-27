<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Middleware;

use Ghostwriter\Testify\Console\Middleware\ExceptionHandlerMiddleware;
use Ghostwriter\Testify\Interface\Console\MiddlewareInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(ExceptionHandlerMiddleware::class)]
final class ExceptionHandlerMiddlewareTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleMiddlewareInterface(): void
    {
        self::assertTrue(is_a(ExceptionHandlerMiddleware::class, MiddlewareInterface::class, true));
    }
}
