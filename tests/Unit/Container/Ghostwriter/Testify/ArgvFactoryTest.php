<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Ghostwriter\Testify;

use Ghostwriter\Testify\Container\Factory\ArgvFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ArgvFactory::class)]
final class ArgvFactoryTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
