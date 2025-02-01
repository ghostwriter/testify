<?php

declare(strict_types=1);

namespace Tests\Unit\Feature\Testify;

use Ghostwriter\Testify\Feature\Testify\TestifyCommandMiddleware;
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
