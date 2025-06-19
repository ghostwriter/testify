<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Type\Alias;

use Ghostwriter\Testify\Type\AliasTypeInterface;

interface IterableTypeInterface extends AliasTypeInterface
{
    // `iterable` type is a union type of `Traversable|array`
}
