<?php

declare(strict_types=1);

namespace Tests\Unit\Console\ErrorHandler;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Console\ErrorHandler\ErrorHandler;
use Ghostwriter\Testify\Interface\Console\Handler\ErrorHandlerInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(ErrorHandler::class)]
final class ErrorHandlerTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleHandlerErrorHandlerInterface(): void
    {
        self::assertClassImplementsInterface(ErrorHandler::class, ErrorHandlerInterface::class);
    }
}
