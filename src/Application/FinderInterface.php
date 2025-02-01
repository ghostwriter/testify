<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application;

interface FinderInterface
{
    public function find(string $directory): iterable;
}
