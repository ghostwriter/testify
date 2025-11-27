<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Provider;

use Ghostwriter\Testify\Console\Provider\CommandProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(CommandProvider::class)]
final class CommandProviderTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
