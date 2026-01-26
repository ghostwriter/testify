<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Generator\Use;

use Ghostwriter\Testify\Application\Generator\GeneratorInterface;

interface UseGeneratorInterface extends GeneratorInterface
{
    public function alias(): string;

    public function compare(self $generator): int;

    public function name(): string;
}
