<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Handler;

use Ghostwriter\Testify\Console\Handler\NotFoundHandler;
use Ghostwriter\Testify\Interface\Console\HandlerInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(NotFoundHandler::class)]
final class NotFoundHandlerTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleHandlerInterface(): void
    {
        self::assertTrue(is_a(NotFoundHandler::class, HandlerInterface::class, true));
    }
}
