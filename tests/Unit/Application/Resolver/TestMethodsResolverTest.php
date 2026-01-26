<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Resolver;

use Ghostwriter\Testify\Application\Resolver\TestMethodsResolver;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(TestMethodsResolver::class)]
final class TestMethodsResolverTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
