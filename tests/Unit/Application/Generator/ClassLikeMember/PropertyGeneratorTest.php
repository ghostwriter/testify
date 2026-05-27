<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\ClassLikeMember;

use Ghostwriter\Testify\Application\Generator\ClassLikeMember\PropertyGenerator;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(PropertyGenerator::class)]
final class PropertyGeneratorTest extends AbstractTestCase
{
    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterTestifyApplicationGeneratorClassLikeMemberGeneratorInterface(): void
    {
        self::assertTrue(is_a(\Ghostwriter\Testify\Application\Generator\ClassLikeMember\PropertyGenerator::class,\Ghostwriter\Testify\Application\Generator\ClassLikeMemberGeneratorInterface::class,true));
    }

    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterTestifyApplicationGeneratorClassLikeMemberPropertyGeneratorInterface(): void
    {
        self::assertTrue(is_a(\Ghostwriter\Testify\Application\Generator\ClassLikeMember\PropertyGenerator::class,\Ghostwriter\Testify\Application\Generator\ClassLikeMember\PropertyGeneratorInterface::class,true));
    }

    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertTrue(is_a(\Ghostwriter\Testify\Application\Generator\ClassLikeMember\PropertyGenerator::class,\Ghostwriter\Testify\Application\Generator\GeneratorInterface::class,true));
    }
}
