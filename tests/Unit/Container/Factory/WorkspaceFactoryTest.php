<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Factory;

use Ghostwriter\Testify\Container\Factory\WorkspaceFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(WorkspaceFactory::class)]
final class WorkspaceFactoryTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
