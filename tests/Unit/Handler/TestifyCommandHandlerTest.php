<?php

declare(strict_types=1);

namespace Tests\Unit\Handler;

use Ghostwriter\Testify\Handler\TestifyCommandHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestifyCommandHandler::class)]
final class TestifyCommandHandlerTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
