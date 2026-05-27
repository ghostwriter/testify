<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Command;

use Ghostwriter\Testify\Console\Command\HelpCommand;
use Ghostwriter\Testify\Interface\Console\CommandInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(HelpCommand::class)]
final class HelpCommandTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleCommandInterface(): void
    {
        self::assertTrue(is_a(HelpCommand::class, CommandInterface::class, true));
    }
}
