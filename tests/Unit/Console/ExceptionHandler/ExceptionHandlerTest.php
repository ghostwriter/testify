<?php

declare(strict_types=1);

namespace Tests\Unit\Console\ExceptionHandler;

use Ghostwriter\Testify\Console\ExceptionHandler\ExceptionHandler;
use Ghostwriter\Testify\Interface\Console\Handler\ExceptionHandlerInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(ExceptionHandler::class)]
final class ExceptionHandlerTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleHandlerExceptionHandlerInterface(): void
    {
        self::assertTrue(is_a(ExceptionHandler::class, ExceptionHandlerInterface::class, true));
    }
}
