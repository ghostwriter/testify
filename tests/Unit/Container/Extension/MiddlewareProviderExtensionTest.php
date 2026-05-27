<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Extension;

use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\Testify\Container\Extension\MiddlewareProviderExtension;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(MiddlewareProviderExtension::class)]
final class MiddlewareProviderExtensionTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterContainerInterfaceServiceExtensionInterface(): void
    {
        self::assertTrue(is_a(MiddlewareProviderExtension::class, ExtensionInterface::class, true));
    }
}
