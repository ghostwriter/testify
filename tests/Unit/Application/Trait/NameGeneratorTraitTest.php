<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Trait;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Trait\NameGeneratorTrait;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(NameGeneratorTrait::class)]
final class NameGeneratorTraitTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
