<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Type\Alias;

use Ghostwriter\Testify\Type\AliasTypeInterface;

interface MixedTypeInterface extends AliasTypeInterface
{
    // `mixed` type is a union type of `object|resource|array|string|float|int|bool|null`
}
