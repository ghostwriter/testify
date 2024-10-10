<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Override;

final readonly class StaticCallGenerator implements GeneratorInterface
{
    public function __construct(
        private string $class,
        private string $method,
        private array $args = [],
    ) {
    }

    #[Override]
    public function generate(): string
    {
        $code = \sprintf('%s::%s(', $this->class, $this->method);

        foreach ($this->args as $arg) {
            if (\str_contains((string) $arg, ' ')) {
                $arg = \sprintf("'%s'", $arg);
            }

            $code .= $arg . ', ';
        }

        return \sprintf('%s);%s', \rtrim($code, ', '), self::NEWLINE);
    }
}
