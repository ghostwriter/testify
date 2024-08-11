<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Command;

use Ghostwriter\Testify\Console\Command\TestifyCommand;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestifyCommand::class)]
final class TestifyCommandTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
