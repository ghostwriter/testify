<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Factory;

use Ghostwriter\Testify\Container\Factory\MiddlewaresFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(MiddlewaresFactory::class)]
final class MiddlewaresFactoryTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
