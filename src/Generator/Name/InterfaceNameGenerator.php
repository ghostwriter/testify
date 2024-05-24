<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator\Name;

use Ghostwriter\Testify\Interface\Generator\NameGeneratorInterface;
use Ghostwriter\Testify\Trait\NameGeneratorTrait;

final readonly class InterfaceNameGenerator implements NameGeneratorInterface
{
    use NameGeneratorTrait;
}
