<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Handler;

use Ghostwriter\Testify\Console\Handler\NotFoundHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(NotFoundHandler::class)]
final class NotFoundHandlerTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
