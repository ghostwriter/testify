<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Builder;

use Ghostwriter\Testify\Application\Builder\BuilderInterface;
use Ghostwriter\Testify\Application\Builder\TestBuilder;
use Ghostwriter\Testify\Application\Builder\TestBuilderInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(TestBuilder::class)]
final class TestBuilderTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationBuilderBuilderInterface(): void
    {
        self::assertTrue(is_a(TestBuilder::class, BuilderInterface::class, true));
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationBuilderTestBuilderInterface(): void
    {
        self::assertTrue(is_a(TestBuilder::class, TestBuilderInterface::class, true));
    }
}
