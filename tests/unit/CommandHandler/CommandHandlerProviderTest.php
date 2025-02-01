<?php

declare(strict_types=1);

namespace Tests\Unit\CommandHandler;

use Ghostwriter\Testify\CommandHandler\CommandHandlerProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CommandHandlerProvider::class)]
final class CommandHandlerProviderTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
