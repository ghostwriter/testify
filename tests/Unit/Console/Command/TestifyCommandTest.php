<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Command;

use Ghostwriter\Testify\Console\Command\TestifyCommand;
use Ghostwriter\Testify\Interface\Console\CommandInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(TestifyCommand::class)]
final class TestifyCommandTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleCommandInterface(): void
    {
        self::assertTrue(is_a(TestifyCommand::class, CommandInterface::class, true));
    }
}
