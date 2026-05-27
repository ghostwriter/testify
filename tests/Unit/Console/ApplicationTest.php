<?php

declare(strict_types=1);

namespace Tests\Unit\Console;

use Ghostwriter\Testify\Console\Application;
use Ghostwriter\Testify\Interface\Console\ApplicationInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(Application::class)]
final class ApplicationTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleApplicationInterface(): void
    {
        self::assertTrue(is_a(Application::class, ApplicationInterface::class, true));
    }
}
