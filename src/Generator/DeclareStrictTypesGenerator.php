<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\Generator\DeclareStrictTypesGeneratorInterface;
use Override;

final readonly class DeclareStrictTypesGenerator implements DeclareStrictTypesGeneratorInterface
{
    #[Override]
    public function generate(): string
    {
        return 'declare(strict_types=1);';
    }
}
