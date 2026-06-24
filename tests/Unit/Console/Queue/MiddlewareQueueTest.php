<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Queue;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Console\Queue\MiddlewareQueue;
use Ghostwriter\Testify\Interface\Console\HandlerInterface;
use Ghostwriter\Testify\Interface\Console\Middleware\Queue\MiddlewareQueueInterface;
use Ghostwriter\Testify\Interface\Console\MiddlewareInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(MiddlewareQueue::class)]
final class MiddlewareQueueTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleHandlerInterface(): void
    {
        self::assertClassImplementsInterface(MiddlewareQueue::class, HandlerInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleMiddlewareInterface(): void
    {
        self::assertClassImplementsInterface(MiddlewareQueue::class, MiddlewareInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleMiddlewareQueueMiddlewareQueueInterface(): void
    {
        self::assertClassImplementsInterface(MiddlewareQueue::class, MiddlewareQueueInterface::class);
    }
}
