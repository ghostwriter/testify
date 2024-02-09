<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface\Generator;

use Ghostwriter\Testify\Interface\GeneratorInterface;

interface ClassLikeMemberGeneratorInterface extends GeneratorInterface
{
    public function compare(self $right): int;

    public function name(): string;
}
