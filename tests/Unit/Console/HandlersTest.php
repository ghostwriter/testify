<?php

declare(strict_types=1);

namespace Tests\Unit\Console;

use Ghostwriter\Testify\Console\Handlers;
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
