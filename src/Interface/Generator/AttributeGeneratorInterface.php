<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface\Generator;

use Ghostwriter\Testify\Interface\GeneratorInterface;

interface AttributeGeneratorInterface extends GeneratorInterface
{
    public function name(): string;
}
