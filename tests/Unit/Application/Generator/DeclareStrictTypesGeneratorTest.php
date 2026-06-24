<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Generator\DeclareStrictTypesGenerator;
use Ghostwriter\Testify\Application\Generator\DeclareStrictTypesGeneratorInterface;
use Ghostwriter\Testify\Application\Generator\GeneratorInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(DeclareStrictTypesGenerator::class)]
final class DeclareStrictTypesGeneratorTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorDeclareStrictTypesGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(
            DeclareStrictTypesGenerator::class,
            DeclareStrictTypesGeneratorInterface::class
        );
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(DeclareStrictTypesGenerator::class, GeneratorInterface::class);
    }
}
