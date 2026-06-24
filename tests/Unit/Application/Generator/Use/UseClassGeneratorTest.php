<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\Use;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Generator\GeneratorInterface;
use Ghostwriter\Testify\Application\Generator\Use\UseClassGenerator;
use Ghostwriter\Testify\Application\Generator\Use\UseClassGeneratorInterface;
use Ghostwriter\Testify\Application\Generator\Use\UseGeneratorInterface;
use Ghostwriter\Testify\Application\Trait\UseGeneratorTrait;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(UseClassGenerator::class)]
final class UseClassGeneratorTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(UseClassGenerator::class, GeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorUseUseClassGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(UseClassGenerator::class, UseClassGeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorUseUseGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(UseClassGenerator::class, UseGeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testUsesGhostwriterTestifyApplicationTraitUseGeneratorTrait(): void
    {
        self::assertClassUsesTrait(UseClassGenerator::class, UseGeneratorTrait::class);
    }
}
