<?php

declare(strict_types=1);

namespace Tests\Unit\Container;

use Ghostwriter\Container\Interface\Service\ProviderInterface;
use Ghostwriter\Container\Service\Provider\AbstractProvider;
use Ghostwriter\Testify\Container\TestifyProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(TestifyProvider::class)]
final class TestifyProviderTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testExtendsGhostwriterContainerServiceProviderAbstractProvider(): void
    {
        self::assertTrue(is_a(TestifyProvider::class, AbstractProvider::class, true));
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterContainerInterfaceServiceProviderInterface(): void
    {
        self::assertTrue(is_a(TestifyProvider::class, ProviderInterface::class, true));
    }
}
