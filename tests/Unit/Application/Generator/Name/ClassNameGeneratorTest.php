<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\Name;

use Ghostwriter\Testify\Application\Generator\Name\ClassNameGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ClassNameGenerator::class)]
final class ClassNameGeneratorTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
