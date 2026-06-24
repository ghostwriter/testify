<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Runner;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Runner\Runner;
use Ghostwriter\Testify\Application\Runner\RunnerInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(Runner::class)]
final class RunnerTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationRunnerRunnerInterface(): void
    {
        self::assertClassImplementsInterface(Runner::class, RunnerInterface::class);
    }
}
