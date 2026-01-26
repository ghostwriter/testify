<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\Name;

use Ghostwriter\Testify\Application\Generator\Name\InterfaceNameGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(InterfaceNameGenerator::class)]
final class InterfaceNameGeneratorTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
