<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Generator\Name;

use Ghostwriter\Testify\Application\Trait\NameGeneratorTrait;

final readonly class InterfaceNameGenerator implements NameGeneratorInterface
{
    use NameGeneratorTrait;
}
