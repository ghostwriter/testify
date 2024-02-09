<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\Generator\DeclareStrictTypesGeneratorInterface;

final readonly class DeclareStrictTypesGenerator implements DeclareStrictTypesGeneratorInterface
{
    public function generate(): string
    {
        return 'declare(strict_types=1);';
    }
}
