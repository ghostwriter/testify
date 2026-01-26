<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Ghostwriter\Config;

use Ghostwriter\Testify\Container\Ghostwriter\Config\ConfigurationExtension;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ConfigurationExtension::class)]
final class ConfigurationExtensionTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
