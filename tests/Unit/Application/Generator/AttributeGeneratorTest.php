<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Generator\AttributeGenerator;
use Ghostwriter\Testify\Application\Generator\AttributeGeneratorInterface;
use Ghostwriter\Testify\Application\Generator\GeneratorInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(AttributeGenerator::class)]
final class AttributeGeneratorTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorAttributeGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(AttributeGenerator::class, AttributeGeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(AttributeGenerator::class, GeneratorInterface::class);
    }
}
