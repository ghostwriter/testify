<?php

declare(strict_types=1);

namespace Tests\Unit\Console\ExceptionHandler;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Console\ExceptionHandler\ExceptionHandler;
use Ghostwriter\Testify\Interface\Console\Handler\ExceptionHandlerInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(ExceptionHandler::class)]
final class ExceptionHandlerTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleHandlerExceptionHandlerInterface(): void
    {
        self::assertClassImplementsInterface(ExceptionHandler::class, ExceptionHandlerInterface::class);
    }
}
