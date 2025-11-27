<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Middleware;

use Ghostwriter\Testify\Console\Middleware\GenerateMiddleware;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(GenerateMiddleware::class)]
final class GenerateMiddlewareTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
