<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Generator\Use\UseGeneratorInterface;

interface ClassLikeMemberGeneratorInterface extends GeneratorInterface
{
    /** @return list<class-string<AttributeGeneratorInterface>> */
    public function attributes(): array;

    public function compare(self $classLikeMemberGenerator): int;

    public function name(): string;

    /** @return list<class-string<UseGeneratorInterface>> */
    public function uses(): array;
}
