<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator;

use Ghostwriter\Testify\Application\Generator\TestDataProviderGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(TestDataProviderGenerator::class)]
final class TestDataProviderGeneratorTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
