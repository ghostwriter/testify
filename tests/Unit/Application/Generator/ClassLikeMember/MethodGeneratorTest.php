<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\ClassLikeMember;

use Ghostwriter\Testify\Application\Generator\ClassLikeMember\MethodGenerator;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(MethodGenerator::class)]
final class MethodGeneratorTest extends AbstractTestCase
{
    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterTestifyApplicationGeneratorClassLikeMemberGeneratorInterface(): void
    {
        self::assertTrue(is_a(\Ghostwriter\Testify\Application\Generator\ClassLikeMember\MethodGenerator::class,\Ghostwriter\Testify\Application\Generator\ClassLikeMemberGeneratorInterface::class,true));
    }

    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterTestifyApplicationGeneratorClassLikeMemberMethodGeneratorInterface(): void
    {
        self::assertTrue(is_a(\Ghostwriter\Testify\Application\Generator\ClassLikeMember\MethodGenerator::class,\Ghostwriter\Testify\Application\Generator\ClassLikeMember\MethodGeneratorInterface::class,true));
    }

    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertTrue(is_a(\Ghostwriter\Testify\Application\Generator\ClassLikeMember\MethodGenerator::class,\Ghostwriter\Testify\Application\Generator\GeneratorInterface::class,true));
    }
}
