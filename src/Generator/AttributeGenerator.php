<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\GeneratorInterface;

use function rtrim;

final readonly class AttributeGenerator implements GeneratorInterface
{
    public function __construct(
        public string $name,
        public array $params = [],
    ) {}

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
