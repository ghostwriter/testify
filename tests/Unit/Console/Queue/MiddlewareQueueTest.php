<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Queue;

use Ghostwriter\Testify\Console\Queue\MiddlewareQueue;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(MiddlewareQueue::class)]
final class MiddlewareQueueTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
