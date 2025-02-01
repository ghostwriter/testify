<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Use;

use Ghostwriter\Testify\Generator\Use\UseConstantGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(UseConstantGenerator::class)]
final class UseConstantGeneratorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
