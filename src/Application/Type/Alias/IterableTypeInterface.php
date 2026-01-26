<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Type\Alias;

use Ghostwriter\Testify\Application\Type\AliasTypeInterface;

interface IterableTypeInterface extends AliasTypeInterface
{
    // `iterable` type is a union type of `Traversable|array`
}
