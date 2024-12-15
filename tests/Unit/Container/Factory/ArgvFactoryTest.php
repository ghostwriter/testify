<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Factory;

use Ghostwriter\Testify\Container\Factory\ArgvFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ArgvFactory::class)]
final class ArgvFactoryTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
