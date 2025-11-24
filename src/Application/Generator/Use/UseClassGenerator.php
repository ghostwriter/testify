<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Generator\Use;

use Ghostwriter\Testify\Application\Trait\UseGeneratorTrait;
use Override;

final readonly class UseClassGenerator implements UseClassGeneratorInterface
{
    use UseGeneratorTrait;

    #[Override]
    public function generate(): string
    {
        $code = 'use ' . $this->name;

        if ('' !== $this->alias) {
            $code .= ' as ' . $this->alias;
        }

        return $code . ';';
    }
}
