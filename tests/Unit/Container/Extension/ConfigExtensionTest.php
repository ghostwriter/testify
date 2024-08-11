<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Extension;

use Ghostwriter\Testify\Container\Extension\ConfigExtension;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ConfigExtension::class)]
final class ConfigExtensionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
