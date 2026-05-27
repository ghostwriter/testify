<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Extension;

use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\Testify\Container\Extension\HandlerProviderExtension;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(HandlerProviderExtension::class)]
final class HandlerProviderExtensionTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterContainerInterfaceServiceExtensionInterface(): void
    {
        self::assertTrue(is_a(HandlerProviderExtension::class, ExtensionInterface::class, true));
    }
}
