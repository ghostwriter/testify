<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\ClassLike;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Generator\ClassLike\InterfaceGenerator;
use Ghostwriter\Testify\Application\Generator\ClassLike\InterfaceGeneratorInterface;
use Ghostwriter\Testify\Application\Generator\ClassLikeGeneratorInterface;
use Ghostwriter\Testify\Application\Generator\GeneratorInterface;
use Ghostwriter\Testify\Application\Trait\ClassLikeGeneratorTrait;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(InterfaceGenerator::class)]
final class InterfaceGeneratorTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorClassLikeGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(InterfaceGenerator::class, ClassLikeGeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorClassLikeInterfaceGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(InterfaceGenerator::class, InterfaceGeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(InterfaceGenerator::class, GeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testUsesGhostwriterTestifyApplicationTraitClassLikeGeneratorTrait(): void
    {
        self::assertClassUsesTrait(InterfaceGenerator::class, ClassLikeGeneratorTrait::class);
    }
}
