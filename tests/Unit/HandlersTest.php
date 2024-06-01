<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\Testify\Handlers;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Handlers::class)]
final class HandlersTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
