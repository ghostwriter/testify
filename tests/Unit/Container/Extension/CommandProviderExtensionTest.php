<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Extension;

use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\Testify\Container\Extension\CommandProviderExtension;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(CommandProviderExtension::class)]
final class CommandProviderExtensionTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterContainerInterfaceServiceExtensionInterface(): void
    {
        self::assertTrue(is_a(CommandProviderExtension::class, ExtensionInterface::class, true));
    }
}
