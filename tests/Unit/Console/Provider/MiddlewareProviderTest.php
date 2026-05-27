<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Provider;

use Ghostwriter\Testify\Console\Provider\MiddlewareProvider;
use Ghostwriter\Testify\Interface\Console\Provider\MiddlewareProviderInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(MiddlewareProvider::class)]
final class MiddlewareProviderTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceConsoleProviderMiddlewareProviderInterface(): void
    {
        self::assertTrue(is_a(MiddlewareProvider::class, MiddlewareProviderInterface::class, true));
    }
}
