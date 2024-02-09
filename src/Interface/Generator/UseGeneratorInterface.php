<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface\Generator;

use Ghostwriter\Testify\Interface\GeneratorInterface;

interface UseGeneratorInterface extends GeneratorInterface
{
    public function alias(): string;

    public function compare(self $generator): int;

    public function name(): string;
}
