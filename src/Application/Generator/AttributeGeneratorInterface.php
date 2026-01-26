<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Generator;

interface AttributeGeneratorInterface extends GeneratorInterface
{
    public function name(): string;
}
