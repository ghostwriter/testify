<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator;

use Ghostwriter\Testify\Application\Generator\ParameterGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(ParameterGenerator::class)]
final class ParameterGeneratorTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
