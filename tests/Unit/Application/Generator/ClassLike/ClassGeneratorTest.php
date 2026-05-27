<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\ClassLike;

use Ghostwriter\Testify\Application\Generator\ClassLike\ClassGenerator;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(ClassGenerator::class)]
final class ClassGeneratorTest extends AbstractTestCase
{
    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterTestifyApplicationGeneratorClassLikeGeneratorInterface(): void
    {
        self::assertTrue(is_a(\Ghostwriter\Testify\Application\Generator\ClassLike\ClassGenerator::class,\Ghostwriter\Testify\Application\Generator\ClassLikeGeneratorInterface::class,true));
    }

    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertTrue(is_a(\Ghostwriter\Testify\Application\Generator\ClassLike\ClassGenerator::class,\Ghostwriter\Testify\Application\Generator\GeneratorInterface::class,true));
    }

    /**
    * @throws Throwable
    */
    public function testUsesGhostwriterTestifyApplicationTraitClassLikeGeneratorTrait(): void
    {
        self::assertTrue(in_array(\Ghostwriter\Testify\Application\Trait\ClassLikeGeneratorTrait::class,class_uses(\Ghostwriter\Testify\Application\Generator\ClassLike\ClassGenerator::class),true));
    }
}
