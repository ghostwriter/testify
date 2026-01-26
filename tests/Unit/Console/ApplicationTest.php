<?php

declare(strict_types=1);

namespace Tests\Unit\Console;

use Ghostwriter\Testify\Console\Application;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Application::class)]
final class ApplicationTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
