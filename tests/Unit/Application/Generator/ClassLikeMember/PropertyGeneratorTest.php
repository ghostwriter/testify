<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\ClassLikeMember;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Generator\ClassLikeMember\PropertyGenerator;
use Ghostwriter\Testify\Application\Generator\ClassLikeMember\PropertyGeneratorInterface;
use Ghostwriter\Testify\Application\Generator\ClassLikeMemberGeneratorInterface;
use Ghostwriter\Testify\Application\Generator\GeneratorInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(PropertyGenerator::class)]
final class PropertyGeneratorTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorClassLikeMemberGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(PropertyGenerator::class, ClassLikeMemberGeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorClassLikeMemberPropertyGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(PropertyGenerator::class, PropertyGeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(PropertyGenerator::class, GeneratorInterface::class);
    }
}
