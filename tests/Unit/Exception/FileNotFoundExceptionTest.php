<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Ghostwriter\Testify\Exception\FileNotFoundException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(FileNotFoundException::class)]
final class FileNotFoundExceptionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
