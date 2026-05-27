<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Value;

use Ghostwriter\Testify\Application\Value\Workspace;
use Ghostwriter\Testify\Application\Value\WorkspaceInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(Workspace::class)]
final class WorkspaceTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationValueWorkspaceInterface(): void
    {
        self::assertTrue(is_a(Workspace::class, WorkspaceInterface::class, true));
    }
}
