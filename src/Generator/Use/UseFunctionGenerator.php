<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator\Use;

use Ghostwriter\Testify\Trait\UseGeneratorTrait;
use Override;

final readonly class UseFunctionGenerator implements UseFunctionGeneratorInterface
{
    use UseGeneratorTrait;

    #[Override]
    public function generate(): string
    {
        $code = 'use function ' . $this->name;

        if ($this->alias !== '') {
            $code .= ' as ' . $this->alias;
        }

        return $code . ';';
    }
}
