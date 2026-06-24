<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Command;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Console\Command\GenerateCommand;
use Ghostwriter\Testify\Interface\Console\CommandInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(GenerateCommand::class)]
final class GenerateCommandTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleCommandInterface(): void
    {
        self::assertClassImplementsInterface(GenerateCommand::class, CommandInterface::class);
    }
}
