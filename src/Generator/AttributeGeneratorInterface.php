<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

interface AttributeGeneratorInterface extends GeneratorInterface
{
    public function name(): string;
}
