<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\ClassLike;

use Ghostwriter\Testify\Application\Generator\ClassLike\InterfaceGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(InterfaceGenerator::class)]
final class InterfaceGeneratorTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
