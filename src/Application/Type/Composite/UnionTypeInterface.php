<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Type\Composite;

use Ghostwriter\Testify\Application\Type\CompositeTypeInterface;

/**
 * — Composed of at least two types.
 * — Not composed of a void type.
 */
interface UnionTypeInterface extends CompositeTypeInterface {}
