<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\ClassLikeMember;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Generator\ClassLikeMember\TraitUseGenerator;
use Ghostwriter\Testify\Application\Generator\ClassLikeMember\TraitUseGeneratorInterface;
use Ghostwriter\Testify\Application\Generator\ClassLikeMemberGeneratorInterface;
use Ghostwriter\Testify\Application\Generator\GeneratorInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(TraitUseGenerator::class)]
final class TraitUseGeneratorTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorClassLikeMemberGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(TraitUseGenerator::class, ClassLikeMemberGeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorClassLikeMemberTraitUseGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(TraitUseGenerator::class, TraitUseGeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(TraitUseGenerator::class, GeneratorInterface::class);
    }
}
