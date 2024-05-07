<?php

declare(strict_types=1);

namespace Tests\Unit;

use Ghostwriter\Testify\PhpFileFinder;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PhpFileFinder::class)]
final class PhpFileFinderTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
