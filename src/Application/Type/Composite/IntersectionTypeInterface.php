<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Type\Composite;

use Ghostwriter\Testify\Application\Type\CompositeTypeInterface;

/**
 * — Composed of at least two types.
 * — Must not contain duplicate types.
 * — Only composed of interfaces and classes.
 */
interface IntersectionTypeInterface extends CompositeTypeInterface {}
