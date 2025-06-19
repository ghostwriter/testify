<?php

declare(strict_types=1);

namespace Tests\Unit\Feature\Help;

use Ghostwriter\Testify\Feature\Help\HelpCommandMiddleware;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(HelpCommandMiddleware::class)]
final class HelpCommandMiddlewareTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
