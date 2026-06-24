<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Value;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Value\Workspace;
use Ghostwriter\Testify\Application\Value\WorkspaceInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(Workspace::class)]
final class WorkspaceTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationValueWorkspaceInterface(): void
    {
        self::assertClassImplementsInterface(Workspace::class, WorkspaceInterface::class);
    }
}
