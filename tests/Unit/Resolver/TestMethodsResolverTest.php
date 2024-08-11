<?php

declare(strict_types=1);

namespace Tests\Unit\Resolver;

use Ghostwriter\Testify\Resolver\TestMethodsResolver;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestMethodsResolver::class)]
final class TestMethodsResolverTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
