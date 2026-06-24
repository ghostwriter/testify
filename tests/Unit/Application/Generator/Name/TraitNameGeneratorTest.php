<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\Name;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Generator\GeneratorInterface;
use Ghostwriter\Testify\Application\Generator\Name\NameGeneratorInterface;
use Ghostwriter\Testify\Application\Generator\Name\TraitNameGenerator;
use Ghostwriter\Testify\Application\Trait\NameGeneratorTrait;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(TraitNameGenerator::class)]
final class TraitNameGeneratorTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(TraitNameGenerator::class, GeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorNameNameGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(TraitNameGenerator::class, NameGeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testUsesGhostwriterTestifyApplicationTraitNameGeneratorTrait(): void
    {
        self::assertClassUsesTrait(TraitNameGenerator::class, NameGeneratorTrait::class);
    }
}
