<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Ghostwriter\Testify;

use Ghostwriter\Testify\Container\Extension\CommandProviderExtension;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(CommandProviderExtension::class)]
final class CommandProviderExtensionTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
