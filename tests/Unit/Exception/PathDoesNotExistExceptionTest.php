<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Ghostwriter\Testify\Exception\PathDoesNotExistException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(PathDoesNotExistException::class)]
final class PathDoesNotExistExceptionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
