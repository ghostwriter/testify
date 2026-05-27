<?php

declare(strict_types=1);

namespace Tests\Unit\Console\ErrorHandler;

use Ghostwriter\Testify\Console\ErrorHandler\ErrorHandler;
use Ghostwriter\Testify\Interface\Console\Handler\ErrorHandlerInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(ErrorHandler::class)]
final class ErrorHandlerTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleHandlerErrorHandlerInterface(): void
    {
        self::assertTrue(is_a(ErrorHandler::class, ErrorHandlerInterface::class, true));
    }
}
