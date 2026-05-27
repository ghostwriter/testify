<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Provider;

use Ghostwriter\Testify\Console\Provider\HandlerProvider;
use Ghostwriter\Testify\Interface\Console\Provider\HandlerProviderInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(HandlerProvider::class)]
final class HandlerProviderTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleProviderHandlerProviderInterface(): void
    {
        self::assertTrue(is_a(HandlerProvider::class, HandlerProviderInterface::class, true));
    }
}
