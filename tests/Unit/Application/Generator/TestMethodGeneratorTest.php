<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator;

use Ghostwriter\Testify\Application\Generator\TestMethodGenerator;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(TestMethodGenerator::class)]
final class TestMethodGeneratorTest extends AbstractTestCase
{
    /**
    * @throws Throwable
    */
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
