<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\Use;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Generator\GeneratorInterface;
use Ghostwriter\Testify\Application\Generator\Use\UseConstantGenerator;
use Ghostwriter\Testify\Application\Generator\Use\UseConstantGeneratorInterface;
use Ghostwriter\Testify\Application\Generator\Use\UseGeneratorInterface;
use Ghostwriter\Testify\Application\Trait\UseGeneratorTrait;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(UseConstantGenerator::class)]
final class UseConstantGeneratorTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(UseConstantGenerator::class, GeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorUseUseConstantGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(UseConstantGenerator::class, UseConstantGeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorUseUseGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(UseConstantGenerator::class, UseGeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testUsesGhostwriterTestifyApplicationTraitUseGeneratorTrait(): void
    {
        self::assertClassUsesTrait(UseConstantGenerator::class, UseGeneratorTrait::class);
    }
}
