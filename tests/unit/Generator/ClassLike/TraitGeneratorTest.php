<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\ClassLike;

use Ghostwriter\Testify\Generator\ClassLike\TraitGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TraitGenerator::class)]
final class TraitGeneratorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
