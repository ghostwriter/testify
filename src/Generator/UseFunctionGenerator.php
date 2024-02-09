<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\Generator\UseFunctionGeneratorInterface;

final readonly class UseFunctionGenerator implements UseFunctionGeneratorInterface
{
    use UseGeneratorTrait;

    public function generate(): string
    {
        $code = 'use function ' . $this->name;

        if ($this->alias !== '') {
            $code .= ' as ' . $this->alias;
        }

        return $code . ';';
    }
}
