<?php

declare(strict_types=1);

namespace Tests\Unit\Factory;

use Ghostwriter\Testify\Factory\HandlersFactory;
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
