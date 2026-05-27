<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\Use;

use Ghostwriter\Testify\Application\Generator\Use\UseConstantGenerator;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(UseConstantGenerator::class)]
final class UseConstantGeneratorTest extends AbstractTestCase
{
    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertTrue(is_a(\Ghostwriter\Testify\Application\Generator\Use\UseConstantGenerator::class,\Ghostwriter\Testify\Application\Generator\GeneratorInterface::class,true));
    }

    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterTestifyApplicationGeneratorUseUseConstantGeneratorInterface(): void
    {
        self::assertTrue(is_a(\Ghostwriter\Testify\Application\Generator\Use\UseConstantGenerator::class,\Ghostwriter\Testify\Application\Generator\Use\UseConstantGeneratorInterface::class,true));
    }

    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterTestifyApplicationGeneratorUseUseGeneratorInterface(): void
    {
        self::assertTrue(is_a(\Ghostwriter\Testify\Application\Generator\Use\UseConstantGenerator::class,\Ghostwriter\Testify\Application\Generator\Use\UseGeneratorInterface::class,true));
    }

    /**
    * @throws Throwable
    */
    public function testUsesGhostwriterTestifyApplicationTraitUseGeneratorTrait(): void
    {
        self::assertTrue(in_array(\Ghostwriter\Testify\Application\Trait\UseGeneratorTrait::class,class_uses(\Ghostwriter\Testify\Application\Generator\Use\UseConstantGenerator::class),true));
    }
}
