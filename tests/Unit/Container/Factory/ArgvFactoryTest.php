<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Factory;

use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\Testify\Container\Factory\ArgvFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(ArgvFactory::class)]
final class ArgvFactoryTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterContainerInterfaceServiceFactoryInterface(): void
    {
        self::assertTrue(is_a(ArgvFactory::class, FactoryInterface::class, true));
    }
}
