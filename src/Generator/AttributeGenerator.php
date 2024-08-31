<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Override;

use function rtrim;

final readonly class AttributeGenerator implements GeneratorInterface
{
    /**
     * @param array<string> $params
     */
    public function __construct(
        public string $name,
        public array $params = [],
    ) {
    }

    #[Override]
    public function generate(): string
    {
        $code = '#[';

        $code .= $this->name . '(';

        foreach ($this->params as $param) {
            $code .= $param . ', ';
        }

        return rtrim($code, ', ') . ')]';
    }
}
