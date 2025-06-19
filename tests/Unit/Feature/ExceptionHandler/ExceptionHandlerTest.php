<?php

declare(strict_types=1);

namespace Tests\Unit\Feature\ExceptionHandler;

use Ghostwriter\Testify\Feature\ExceptionHandler\ExceptionHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ExceptionHandler::class)]
final class ExceptionHandlerTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
