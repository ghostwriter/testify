<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Middleware;

use Ghostwriter\Testify\Console\Middleware\HelpCommandMiddleware;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(HelpCommandMiddleware::class)]
final class HelpCommandMiddlewareTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
