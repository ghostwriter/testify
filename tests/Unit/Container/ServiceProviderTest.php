<?php

declare(strict_types=1);

namespace Tests\Unit\Container;

use Ghostwriter\Testify\Container\ServiceProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ServiceProvider::class)]
final class ServiceProviderTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
