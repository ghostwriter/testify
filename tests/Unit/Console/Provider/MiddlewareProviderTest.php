<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Provider;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Console\Provider\MiddlewareProvider;
use Ghostwriter\Testify\Interface\Console\Provider\MiddlewareProviderInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(MiddlewareProvider::class)]
final class MiddlewareProviderTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleProviderMiddlewareProviderInterface(): void
    {
        self::assertClassImplementsInterface(MiddlewareProvider::class, MiddlewareProviderInterface::class);
    }
}
