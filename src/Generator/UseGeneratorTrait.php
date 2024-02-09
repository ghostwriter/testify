<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\Generator\UseGeneratorInterface;

trait UseGeneratorTrait
{
    public function __construct(
        public readonly string $name,
        public readonly string $alias = '',
    ) {
    }

    final public function alias(): string
    {
        return $this->alias;
    }

    final public function compare(UseGeneratorInterface $generator): int
    {
        return match (true) {
            $this::class === $generator::class => $this->name <=> $generator->name(),
            $generator instanceof UseClassGenerator => match (true) {
                $this instanceof UseConstantGenerator => self::ORDER_BEFORE,
                $this instanceof UseFunctionGenerator => self::ORDER_BEFORE,
                default => self::ORDER_SAME,
            },
            $generator instanceof UseFunctionGenerator => match (true) {
                $this instanceof UseClassGenerator => self::ORDER_AFTER,
                $this instanceof UseConstantGenerator => self::ORDER_BEFORE,
                default => self::ORDER_SAME,
            },
            $generator instanceof UseConstantGenerator => match (true) {
                $this instanceof UseClassGenerator => self::ORDER_AFTER,
                $this instanceof UseFunctionGenerator => self::ORDER_AFTER,
                default => self::ORDER_SAME,
            },
            default => self::ORDER_SAME,
        };
    }

    final public function name(): string
    {
        return $this->name;
    }
}
