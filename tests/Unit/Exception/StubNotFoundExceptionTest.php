<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Ghostwriter\Testify\Exception\StubNotFoundException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(StubNotFoundException::class)]
final class StubNotFoundExceptionTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
