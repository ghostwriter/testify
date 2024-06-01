<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Trait;

use Ghostwriter\Testify\Generator\Use\UseClassGenerator;
use Ghostwriter\Testify\Generator\Use\UseConstantGenerator;
use Ghostwriter\Testify\Generator\Use\UseFunctionGenerator;
use Ghostwriter\Testify\Interface\Generator\UseGeneratorInterface;
use Override;

trait UseGeneratorTrait
{
    public function __construct(
        public readonly string $name,
        public readonly string $alias = '',
    ) {}

    #[Override]
    final public function alias(): string
    {
        return $this->alias;
    }

    #[Override]
    final public function compare(UseGeneratorInterface $generator): int
    {
        return match (true) {
            $this::class === $generator::class => $this->name <=> $generator->name(),
            $generator instanceof UseClassGenerator => match (true) {
                $this instanceof UseConstantGenerator, $this instanceof UseFunctionGenerator => self::ORDER_AFTER,
                default => self::ORDER_SAME,
            },
            $generator instanceof UseFunctionGenerator => match (true) {
                $this instanceof UseClassGenerator => self::ORDER_BEFORE,
                $this instanceof UseConstantGenerator => self::ORDER_AFTER,
                default => self::ORDER_SAME,
            },
            $generator instanceof UseConstantGenerator => match (true) {
                $this instanceof UseClassGenerator, $this instanceof UseFunctionGenerator => self::ORDER_BEFORE,
                default => self::ORDER_SAME,
            },
            default => self::ORDER_SAME,
        };
    }

    #[Override]
    final public function name(): string
    {
        return $this->name;
    }
}
