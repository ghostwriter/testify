<?php

declare(strict_types=1);

namespace Tests\Unit\Value;

use Ghostwriter\Testify\Value\Argv;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Argv::class)]
final class ArgvTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
