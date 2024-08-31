<?php

declare(strict_types=1);

namespace Tests\Unit\Console;

use Ghostwriter\Testify\Console\Runner;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Runner::class)]
final class RunnerTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}