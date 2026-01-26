<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\ClassLike;

use Ghostwriter\Testify\Application\Generator\ClassLike\TraitGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(TraitGenerator::class)]
final class TraitGeneratorTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
