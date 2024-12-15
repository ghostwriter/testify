<?php

declare(strict_types=1);

namespace Tests\Unit\Middleware;

use Ghostwriter\Testify\Middleware\MiddlewareQueue;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(MiddlewareQueue::class)]
final class MiddlewareQueueTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
