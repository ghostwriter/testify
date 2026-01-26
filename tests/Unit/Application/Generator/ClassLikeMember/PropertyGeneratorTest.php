<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\ClassLikeMember;

use Ghostwriter\Testify\Application\Generator\ClassLikeMember\PropertyGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(PropertyGenerator::class)]
final class PropertyGeneratorTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
