<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Trait;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Trait\UseGeneratorTrait;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(UseGeneratorTrait::class)]
final class UseGeneratorTraitTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
