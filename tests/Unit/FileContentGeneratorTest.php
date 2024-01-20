<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Ghostwriter\Testify\FileContentGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(FileContentGenerator::class)]
final class FileContentGeneratorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
