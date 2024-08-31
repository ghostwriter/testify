<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Factory;

use Ghostwriter\Testify\Container\Factory\HandlersFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(HandlersFactory::class)]
final class HandlersFactoryTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
