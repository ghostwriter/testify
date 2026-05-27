<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Command;

use Ghostwriter\Testify\Console\Command\GenerateCommand;
use Ghostwriter\Testify\Interface\Console\CommandInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(GenerateCommand::class)]
final class GenerateCommandTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleCommandInterface(): void
    {
        self::assertTrue(is_a(GenerateCommand::class, CommandInterface::class, true));
    }
}
