<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Generator\FileGenerator;
use Ghostwriter\Testify\Application\Generator\FileGeneratorInterface;
use Ghostwriter\Testify\Application\Generator\GeneratorInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(FileGenerator::class)]
final class FileGeneratorTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorFileGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(FileGenerator::class, FileGeneratorInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertClassImplementsInterface(FileGenerator::class, GeneratorInterface::class);
    }
}
