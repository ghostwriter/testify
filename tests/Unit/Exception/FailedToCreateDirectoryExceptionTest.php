<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Exception;

use Ghostwriter\Testify\Exception\FailedToCreateDirectoryException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(FailedToCreateDirectoryException::class)]
final class FailedToCreateDirectoryExceptionTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
