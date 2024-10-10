<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface;

use Generator;

interface RunnerInterface
{
    /**
     * @return Generator<string,string>
     */
    public function run(WorkspaceInterface $workspace): Generator;
}
