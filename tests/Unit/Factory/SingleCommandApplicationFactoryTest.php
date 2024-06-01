<?php

declare(strict_types=1);

namespace Tests\Unit\Factory;

use Ghostwriter\Testify\Factory\SingleCommandApplicationFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SingleCommandApplicationFactory::class)]
final class SingleCommandApplicationFactoryTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
