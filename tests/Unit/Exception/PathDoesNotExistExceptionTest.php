<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Exception;

use Ghostwriter\Testify\Exception\PathDoesNotExistException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PathDoesNotExistException::class)]
final class PathDoesNotExistExceptionTest extends TestCase
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
