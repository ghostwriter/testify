<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Value;

use Ghostwriter\Testify\Application\Value\Workspace;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(Workspace::class)]
final class WorkspaceTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
