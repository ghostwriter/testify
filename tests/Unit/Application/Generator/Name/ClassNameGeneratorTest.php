<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\Name;

use Ghostwriter\Testify\Application\Generator\Name\ClassNameGenerator;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(ClassNameGenerator::class)]
final class ClassNameGeneratorTest extends AbstractTestCase
{
    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertTrue(is_a(\Ghostwriter\Testify\Application\Generator\Name\ClassNameGenerator::class,\Ghostwriter\Testify\Application\Generator\GeneratorInterface::class,true));
    }

    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterTestifyApplicationGeneratorNameNameGeneratorInterface(): void
    {
        self::assertTrue(is_a(\Ghostwriter\Testify\Application\Generator\Name\ClassNameGenerator::class,\Ghostwriter\Testify\Application\Generator\Name\NameGeneratorInterface::class,true));
    }

    /**
    * @throws Throwable
    */
    public function testUsesGhostwriterTestifyApplicationTraitNameGeneratorTrait(): void
    {
        self::assertTrue(in_array(\Ghostwriter\Testify\Application\Trait\NameGeneratorTrait::class,class_uses(\Ghostwriter\Testify\Application\Generator\Name\ClassNameGenerator::class),true));
    }
}
