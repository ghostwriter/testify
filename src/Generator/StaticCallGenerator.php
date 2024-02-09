<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\GeneratorInterface;

use function rtrim;
use function sprintf;

final class StaticCallGenerator implements GeneratorInterface
{
    public function __construct(
        private string $class,
        private string $method,
        private array $args = [],
    ) {
    }

    public function generate(): string
    {
        $code = sprintf("%s::%s('", $this->class, $this->method);

        foreach ($this->args as $arg) {
            $code .= $arg . ', ';
        }

        return sprintf("%s');%s", rtrim($code, ', '), self::NEWLINE);
    }
}