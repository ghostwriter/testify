<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Ghostwriter\Testify\TestMethodsResolver;
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
