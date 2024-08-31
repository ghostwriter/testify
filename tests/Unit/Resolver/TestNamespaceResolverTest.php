<?php

declare(strict_types=1);

namespace Tests\Unit\Resolver;

use Ghostwriter\Testify\Resolver\TestNamespaceResolver;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestNamespaceResolver::class)]
final class TestNamespaceResolverTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
