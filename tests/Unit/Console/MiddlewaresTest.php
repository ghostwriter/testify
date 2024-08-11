<?php

declare(strict_types=1);

namespace Tests\Unit\Console;

use Ghostwriter\Testify\Console\Middlewares;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Middlewares::class)]
final class MiddlewaresTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
