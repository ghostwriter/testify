<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Type\Composite;

use Ghostwriter\Testify\Type\CompositeTypeInterface;

/**
 * — Composed of at least two types.
 * — Not composed of a void type.
 */
interface UnionTypeInterface extends CompositeTypeInterface
{
}
