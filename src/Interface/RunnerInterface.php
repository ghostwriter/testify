<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface;

use Generator;

interface RunnerInterface
{
    public function run(ProjectInterface $project): Generator;
}
