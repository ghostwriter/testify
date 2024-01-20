<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Ghostwriter\Testify\Directory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Directory::class)]
final class DirectoryTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
