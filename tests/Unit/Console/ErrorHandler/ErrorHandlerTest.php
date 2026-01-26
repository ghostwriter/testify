<?php

declare(strict_types=1);

namespace Tests\Unit\Console\ErrorHandler;

use Ghostwriter\Testify\Console\ErrorHandler\ErrorHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ErrorHandler::class)]
final class ErrorHandlerTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
