<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\ClassLike;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Generator\ClassLike\TraitGenerator;
use Ghostwriter\Testify\Application\Generator\ClassLike\TraitGeneratorInterface;
use Ghostwriter\Testify\Application\Generator\ClassLikeGeneratorInterface;
use Ghostwriter\Testify\Application\Generator\GeneratorInterface;
use Ghostwriter\Testify\Application\Trait\ClassLikeGeneratorTrait;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(TraitGenerator::class)]
final class TraitGeneratorTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorClassLikeGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(TraitGenerator::class, ClassLikeGeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorClassLikeTraitGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(TraitGenerator::class, TraitGeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(TraitGenerator::class, GeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testUsesGhostwriterTestifyApplicationTraitClassLikeGeneratorTrait(): void
    {
        self::assertClassUsesTrait(TraitGenerator::class, ClassLikeGeneratorTrait::class);
    }
}
