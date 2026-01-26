<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Type;

interface CompositeTypeInterface extends TypeInterface
{
    /**
     * @return non-empty-list<TypeInterface>
     */
    public function types(): array;
}
