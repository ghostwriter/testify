<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator\Use;

use Ghostwriter\Testify\Generator\GeneratorInterface;

interface UseGeneratorInterface extends GeneratorInterface
{
    public function alias(): string;

    public function compare(self $generator): int;

    public function name(): string;
}
