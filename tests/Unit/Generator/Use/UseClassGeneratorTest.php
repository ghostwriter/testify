<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Use;

use Ghostwriter\Testify\Generator\Use\UseClassGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UseClassGenerator::class)]
final class UseClassGeneratorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
