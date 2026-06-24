<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\Use;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Generator\GeneratorInterface;
use Ghostwriter\Testify\Application\Generator\Use\UseFunctionGenerator;
use Ghostwriter\Testify\Application\Generator\Use\UseFunctionGeneratorInterface;
use Ghostwriter\Testify\Application\Generator\Use\UseGeneratorInterface;
use Ghostwriter\Testify\Application\Trait\UseGeneratorTrait;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(UseFunctionGenerator::class)]
final class UseFunctionGeneratorTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(UseFunctionGenerator::class, GeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorUseUseFunctionGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(UseFunctionGenerator::class, UseFunctionGeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorUseUseGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(UseFunctionGenerator::class, UseGeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testUsesGhostwriterTestifyApplicationTraitUseGeneratorTrait(): void
    {
        self::assertClassUsesTrait(UseFunctionGenerator::class, UseGeneratorTrait::class);
    }
}
