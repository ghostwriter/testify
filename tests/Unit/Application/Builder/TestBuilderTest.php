<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Builder;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Builder\BuilderInterface;
use Ghostwriter\Testify\Application\Builder\TestBuilder;
use Ghostwriter\Testify\Application\Builder\TestBuilderInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(TestBuilder::class)]
final class TestBuilderTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationBuilderBuilderInterface(): void
    {
        self::assertClassImplementsInterface(TestBuilder::class, BuilderInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationBuilderTestBuilderInterface(): void
    {
        self::assertClassImplementsInterface(TestBuilder::class, TestBuilderInterface::class);
    }
}
