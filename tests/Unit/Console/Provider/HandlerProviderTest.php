<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Provider;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Console\Provider\HandlerProvider;
use Ghostwriter\Testify\Interface\Console\Provider\HandlerProviderInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(HandlerProvider::class)]
final class HandlerProviderTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleProviderHandlerProviderInterface(): void
    {
        self::assertClassImplementsInterface(HandlerProvider::class, HandlerProviderInterface::class);
    }
}
