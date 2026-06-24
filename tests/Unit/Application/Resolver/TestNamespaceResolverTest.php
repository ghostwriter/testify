<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Resolver;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Resolver\TestNamespaceResolver;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(TestNamespaceResolver::class)]
final class TestNamespaceResolverTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
