<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Provider;

use Ghostwriter\Testify\Console\Provider\MiddlewareProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(MiddlewareProvider::class)]
final class MiddlewareProviderTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
