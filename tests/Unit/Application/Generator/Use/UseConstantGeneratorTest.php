<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\Use;

use Ghostwriter\Testify\Application\Generator\Use\UseConstantGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(UseConstantGenerator::class)]
final class UseConstantGeneratorTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
