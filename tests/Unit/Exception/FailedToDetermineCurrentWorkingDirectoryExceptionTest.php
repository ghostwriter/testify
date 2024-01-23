<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Exception;

use Ghostwriter\Testify\Exception\FailedToDetermineCurrentWorkingDirectoryException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(FailedToDetermineCurrentWorkingDirectoryException::class)]
final class FailedToDetermineCurrentWorkingDirectoryExceptionTest extends TestCase
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