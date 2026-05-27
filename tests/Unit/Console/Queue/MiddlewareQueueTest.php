<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Queue;

use Ghostwriter\Testify\Console\Queue\MiddlewareQueue;
use Ghostwriter\Testify\Interface\Console\HandlerInterface;
use Ghostwriter\Testify\Interface\Console\Middleware\Queue\MiddlewareQueueInterface;
use Ghostwriter\Testify\Interface\Console\MiddlewareInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(MiddlewareQueue::class)]
final class MiddlewareQueueTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleHandlerInterface(): void
    {
        self::assertTrue(is_a(MiddlewareQueue::class, HandlerInterface::class, true));
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleMiddlewareInterface(): void
    {
        self::assertTrue(is_a(MiddlewareQueue::class, MiddlewareInterface::class, true));
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleMiddlewareQueueMiddlewareQueueInterface(): void
    {
        self::assertTrue(is_a(MiddlewareQueue::class, MiddlewareQueueInterface::class, true));
    }
}
