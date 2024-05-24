<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface\Generator;

use Ghostwriter\Testify\Interface\GeneratorInterface;

interface ClassLikeMemberGeneratorInterface extends GeneratorInterface
{
    public function compare(self $other): int;

    public function name(): string;

    /** @return array<class-string<AttributeGeneratorInterface>> */
    public function attributes(): array;

    /** @return array<class-string<UseGeneratorInterface>> */
    public function uses(): array;
}
