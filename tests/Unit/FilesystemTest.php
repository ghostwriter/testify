<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Ghostwriter\Testify\Filesystem;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Filesystem::class)]
final class FilesystemTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
