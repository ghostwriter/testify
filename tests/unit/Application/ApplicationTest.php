<?php

declare(strict_types=1);

namespace Tests\Unit\Application;

use Ghostwriter\Testify\Application\Application;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Application::class)]
final class ApplicationTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
