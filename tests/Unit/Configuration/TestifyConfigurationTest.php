<?php

declare(strict_types=1);

namespace Tests\Unit\Configuration;

use Ghostwriter\Config\AbstractConfiguration;
use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Configuration\TestifyConfiguration;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(TestifyConfiguration::class)]
final class TestifyConfigurationTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testExtendsGhostwriterConfigAbstractConfiguration(): void
    {
        self::assertClassExtendsClass(TestifyConfiguration::class, AbstractConfiguration::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterConfigInterfaceConfigurationInterface(): void
    {
        self::assertClassImplementsInterface(TestifyConfiguration::class, ConfigurationInterface::class);
    }
}
