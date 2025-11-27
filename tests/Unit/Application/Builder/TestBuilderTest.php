<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Builder;

use Ghostwriter\Testify\Application\Builder\TestBuilder;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(TestBuilder::class)]
final class TestBuilderTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
