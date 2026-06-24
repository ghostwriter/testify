<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Factory;

use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Container\Factory\ArgvFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(ArgvFactory::class)]
final class ArgvFactoryTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterContainerInterfaceServiceFactoryInterface(): void
    {
        self::assertClassImplementsInterface(ArgvFactory::class, FactoryInterface::class);
    }
}
