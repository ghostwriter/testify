<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator\Use;

use Ghostwriter\Testify\Interface\Generator\UseConstantGeneratorInterface;
use Ghostwriter\Testify\Trait\UseGeneratorTrait;

final readonly class UseConstantGenerator implements UseConstantGeneratorInterface
{
    use UseGeneratorTrait;

    public function generate(): string
    {
        $code = 'use const ' . $this->name;

        if ($this->alias !== '') {
            $code .= ' as ' . $this->alias;
        }

        return $code . ';';
    }
}
