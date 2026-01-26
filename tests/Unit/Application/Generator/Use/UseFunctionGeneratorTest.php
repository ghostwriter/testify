<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\Use;

use Ghostwriter\Testify\Application\Generator\Use\UseFunctionGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(UseFunctionGenerator::class)]
final class UseFunctionGeneratorTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
