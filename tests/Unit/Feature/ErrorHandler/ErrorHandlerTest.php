<?php

declare(strict_types=1);

namespace Tests\Unit\Feature\ErrorHandler;

use Ghostwriter\Testify\Feature\ErrorHandler\ErrorHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ErrorHandler::class)]
final class ErrorHandlerTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
