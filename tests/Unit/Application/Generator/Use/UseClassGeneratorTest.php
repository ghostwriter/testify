<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\Use;

use Ghostwriter\Testify\Application\Generator\Use\UseClassGenerator;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(UseClassGenerator::class)]
final class UseClassGeneratorTest extends AbstractTestCase
{
    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertTrue(is_a(\Ghostwriter\Testify\Application\Generator\Use\UseClassGenerator::class,\Ghostwriter\Testify\Application\Generator\GeneratorInterface::class,true));
    }

    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterTestifyApplicationGeneratorUseUseClassGeneratorInterface(): void
    {
        self::assertTrue(is_a(\Ghostwriter\Testify\Application\Generator\Use\UseClassGenerator::class,\Ghostwriter\Testify\Application\Generator\Use\UseClassGeneratorInterface::class,true));
    }

    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterTestifyApplicationGeneratorUseUseGeneratorInterface(): void
    {
        self::assertTrue(is_a(\Ghostwriter\Testify\Application\Generator\Use\UseClassGenerator::class,\Ghostwriter\Testify\Application\Generator\Use\UseGeneratorInterface::class,true));
    }

    /**
    * @throws Throwable
    */
    public function testUsesGhostwriterTestifyApplicationTraitUseGeneratorTrait(): void
    {
        self::assertTrue(in_array(\Ghostwriter\Testify\Application\Trait\UseGeneratorTrait::class,class_uses(\Ghostwriter\Testify\Application\Generator\Use\UseClassGenerator::class),true));
    }
}
