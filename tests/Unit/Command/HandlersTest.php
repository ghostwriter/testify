<?php

declare(strict_types=1);

namespace Tests\Unit\Command;

use Ghostwriter\Testify\Command\Handlers;
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
