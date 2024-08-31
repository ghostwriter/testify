<?php

declare(strict_types=1);

namespace Tests\Unit\Command;

use Ghostwriter\Testify\Command\HelpCommand;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(HelpCommand::class)]
final class HelpCommandTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
