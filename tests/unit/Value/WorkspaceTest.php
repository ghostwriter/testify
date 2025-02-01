<?php

declare(strict_types=1);

namespace Tests\Unit\Value;

use Ghostwriter\Testify\Value\Workspace;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Workspace::class)]
final class WorkspaceTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
