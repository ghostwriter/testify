<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\Use;

use Ghostwriter\Testify\Application\Generator\Use\UseClassGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(UseClassGenerator::class)]
final class UseClassGeneratorTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
