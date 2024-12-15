<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Runner;

use Generator;
use Ghostwriter\Testify\Value\WorkspaceInterface;

interface RunnerInterface
{
    /**
     * @return Generator<string,string>
     */
    public function run(WorkspaceInterface $workspace): Generator;
}
