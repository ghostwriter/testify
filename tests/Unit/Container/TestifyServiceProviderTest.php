<?php

declare(strict_types=1);

namespace Tests\Unit\Container;

use Ghostwriter\Testify\Container\TestifyServiceProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestifyServiceProvider::class)]
final class TestifyServiceProviderTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
