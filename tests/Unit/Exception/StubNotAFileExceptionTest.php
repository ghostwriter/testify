<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Exception;

use Ghostwriter\Testify\Exception\StubNotAFileException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(StubNotAFileException::class)]
final class StubNotAFileExceptionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}