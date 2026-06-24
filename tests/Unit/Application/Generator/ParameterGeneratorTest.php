<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Generator\GeneratorInterface;
use Ghostwriter\Testify\Application\Generator\ParameterGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(ParameterGenerator::class)]
final class ParameterGeneratorTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(ParameterGenerator::class, GeneratorInterface::class);
    }
}
