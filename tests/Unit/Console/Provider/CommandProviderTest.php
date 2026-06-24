<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Provider;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Console\Provider\CommandProvider;
use Ghostwriter\Testify\Interface\Console\Provider\CommandProviderInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(CommandProvider::class)]
final class CommandProviderTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleProviderCommandProviderInterface(): void
    {
        self::assertClassImplementsInterface(CommandProvider::class, CommandProviderInterface::class);
    }
}
