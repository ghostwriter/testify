<?php

declare(strict_types=1);

namespace Tests\Unit\Console;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Console\Application;
use Ghostwriter\Testify\Interface\Console\ApplicationInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(Application::class)]
final class ApplicationTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleApplicationInterface(): void
    {
        self::assertClassImplementsInterface(Application::class, ApplicationInterface::class);
    }
}
