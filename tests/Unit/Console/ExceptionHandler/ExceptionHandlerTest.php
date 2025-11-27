<?php

declare(strict_types=1);

namespace Tests\Unit\Console\ExceptionHandler;

use Ghostwriter\Testify\Console\ExceptionHandler\ExceptionHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ExceptionHandler::class)]
final class ExceptionHandlerTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
