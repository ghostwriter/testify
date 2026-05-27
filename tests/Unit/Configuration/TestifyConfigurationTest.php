<?php

declare(strict_types=1);

namespace Tests\Unit\Configuration;

use Ghostwriter\Config\AbstractConfiguration;
use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Testify\Configuration\TestifyConfiguration;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(TestifyConfiguration::class)]
final class TestifyConfigurationTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testExtendsGhostwriterConfigAbstractConfiguration(): void
    {
        self::assertTrue(is_a(TestifyConfiguration::class, AbstractConfiguration::class, true));
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterConfigInterfaceConfigurationInterface(): void
    {
        self::assertTrue(is_a(TestifyConfiguration::class, ConfigurationInterface::class, true));
    }
}
