<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Factory\Ghostwriter\Config;

use Ghostwriter\Testify\Container\Factory\Ghostwriter\Config\ConfigurationFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ConfigurationFactory::class)]
final class ConfigurationFactoryTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
