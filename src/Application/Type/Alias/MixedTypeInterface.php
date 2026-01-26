<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Type\Alias;

use Ghostwriter\Testify\Application\Type\AliasTypeInterface;

interface MixedTypeInterface extends AliasTypeInterface
{
    // `mixed` type is a union type of `object|resource|array|string|float|int|bool|null`
}
