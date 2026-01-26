<?php

declare(strict_types=1);

namespace Tests\Unit\Container;

use Ghostwriter\Testify\Container\TestifyDefinition;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(TestifyDefinition::class)]
final class TestifyDefinitionTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
