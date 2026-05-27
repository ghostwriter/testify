<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Handler;

use Ghostwriter\Testify\Console\Handler\TestifyHandler;
use Ghostwriter\Testify\Interface\Console\HandlerInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(TestifyHandler::class)]
final class TestifyHandlerTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleHandlerInterface(): void
    {
        self::assertTrue(is_a(TestifyHandler::class, HandlerInterface::class, true));
    }
}
