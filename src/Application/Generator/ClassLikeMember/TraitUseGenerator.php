<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Generator\ClassLikeMember;

use Ghostwriter\Testify\Application\Generator\ClassLikeMemberGeneratorInterface;
use Ghostwriter\Testify\Application\Generator\Name\NameGeneratorInterface;
use Override;

final readonly class TraitUseGenerator implements TraitUseGeneratorInterface
{
    /** @param list<NameGeneratorInterface> $traits */
    public function __construct(
        private array $traits,
    ) {}

    #[Override]
    public function attributes(): array
    {
        return [];
    }

    #[Override]
    public function compare(ClassLikeMemberGeneratorInterface $classLikeMemberGenerator): int
    {
        return 0;
    }

    #[Override]
    public function generate(): string
    {
        $code = '';

        foreach ($this->traits as $trait) {
            $code .= 'use ' . $trait->generate() . ';' . self::NEWLINE . self::INDENT;
        }

        return $code;
    }

    #[Override]
    public function name(): string
    {
        return '';
    }

    #[Override]
    public function uses(): array
    {
        return $this->traits;
    }
}
