<?php

declare(strict_types=1);

namespace Tests\Unit\Feature\NotFound;

use Ghostwriter\Testify\Feature\NotFound\CommandNotFoundHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CommandNotFoundHandler::class)]
final class CommandNotFoundHandlerTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
