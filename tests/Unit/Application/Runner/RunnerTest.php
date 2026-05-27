<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Runner;

use Ghostwriter\Testify\Application\Runner\Runner;
use Ghostwriter\Testify\Application\Runner\RunnerInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(Runner::class)]
final class RunnerTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationRunnerRunnerInterface(): void
    {
        self::assertTrue(is_a(Runner::class, RunnerInterface::class, true));
    }
}
