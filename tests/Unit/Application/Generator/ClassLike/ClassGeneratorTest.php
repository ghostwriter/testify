<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\ClassLike;

use Ghostwriter\Testify\Application\Generator\ClassLike\ClassGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ClassGenerator::class)]
final class ClassGeneratorTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
