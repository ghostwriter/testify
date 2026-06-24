<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Handler;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Console\Handler\TestifyHandler;
use Ghostwriter\Testify\Interface\Console\HandlerInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(TestifyHandler::class)]
final class TestifyHandlerTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleHandlerInterface(): void
    {
        self::assertClassImplementsInterface(TestifyHandler::class, HandlerInterface::class);
    }
}
