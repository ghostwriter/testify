<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Generator;

use Override;

use function mb_rtrim;

final readonly class AttributeGenerator implements AttributeGeneratorInterface
{
    /** @param list<string> $params */
    public function __construct(
        public string $name,
        public array $params = [],
    ) {}

    #[Override]
    public function generate(): string
    {
        $code = '#[';

        $code .= $this->name . '(';

        foreach ($this->params as $param) {
            $code .= $param . ', ';
        }

        return mb_rtrim($code, ', ') . ')]';
    }

    #[Override]
    public function name(): string
    {
        return $this->name;
    }
}
