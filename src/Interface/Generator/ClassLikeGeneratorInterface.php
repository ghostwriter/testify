<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface\Generator;

use Ghostwriter\Testify\Interface\Generator\ClassLikeMember\MethodGeneratorInterface;
use Ghostwriter\Testify\Interface\GeneratorInterface;

interface ClassLikeGeneratorInterface extends GeneratorInterface
{
    public function compare(self $other): int;
    //    public function addMethod(MethodGeneratorInterface $method): void;

    public function name(): string;

    public function uses(): array;
}
