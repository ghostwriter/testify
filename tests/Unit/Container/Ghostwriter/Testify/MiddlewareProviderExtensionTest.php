<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Ghostwriter\Testify;

use Ghostwriter\Testify\Container\Extension\MiddlewareProviderExtension;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(MiddlewareProviderExtension::class)]
final class MiddlewareProviderExtensionTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
