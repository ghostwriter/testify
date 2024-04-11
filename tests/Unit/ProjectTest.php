<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Ghostwriter\Testify\Project;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Project::class)]
final class ProjectTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
