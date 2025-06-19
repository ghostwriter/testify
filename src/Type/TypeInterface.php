<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Type;

interface TypeInterface
{
    public function toString(): string;
}

// PHP supports two type aliases: mixed and iterable which corresponds
// to the union type of object|resource|array|string|float|int|bool|null
// and Traversable|array respectively.

/**
 * Built-in types:
 *      null type
 *      scalar types:
 *          bool type
 *          int type
 *          float type
 *          string type
 *      array type
 *      object type
 *      resource type
 *      never type
 *      void type
 * Relative class types: self, parent, and static
 *
 * Value types:
 *      false
 *      true
 * User-defined types (generally referred to as class-types)
 *      Interfaces
 *      Classes
 *      Enumerations
 * callable type
 */
