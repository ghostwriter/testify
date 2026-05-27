<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Provider;

use Ghostwriter\Testify\Console\Provider\CommandProvider;
use Ghostwriter\Testify\Interface\Console\Provider\CommandProviderInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(CommandProvider::class)]
final class CommandProviderTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleProviderCommandProviderInterface(): void
    {
        self::assertTrue(is_a(CommandProvider::class, CommandProviderInterface::class, true));
    }
}
