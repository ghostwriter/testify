<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Resolver;

use Ghostwriter\Testify\Application\Resolver\TestNamespaceResolver;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(TestNamespaceResolver::class)]
final class TestNamespaceResolverTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
