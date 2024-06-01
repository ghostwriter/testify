<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\Testify\Testify;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Testify::class)]
final class TestifyTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
