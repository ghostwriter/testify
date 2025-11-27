<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Provider;

use Ghostwriter\Testify\Console\Provider\HandlerProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(HandlerProvider::class)]
final class HandlerProviderTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
