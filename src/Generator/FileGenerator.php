<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\Generator\DeclareStrictTypesGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\FileGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\NamespaceGeneratorInterface;
use Ghostwriter\Testify\Interface\GeneratorInterface;
use Override;

use function rtrim;
use function usort;
use function array_reduce;

final class FileGenerator implements FileGeneratorInterface
{
    /**
     * @param array<class-string<GeneratorInterface>,DeclareStrictTypesGeneratorInterface|NamespaceGeneratorInterface> $namespaces
     */
    public function __construct(
        private readonly array $namespaces,
        private readonly bool $declareStrictTypes,
    ) {}

    #[Override]
    public function generate(): string
    {
        $namespaces = $this->namespaces;

        if ($this->declareStrictTypes) {
            $namespaces[] = new DeclareStrictTypesGenerator();
        }

        usort(
            $namespaces,
            static function (GeneratorInterface $left, GeneratorInterface $right) {
                return match (true) {
                    $left instanceof NamespaceGeneratorInterface => match (true) {
                        $right instanceof NamespaceGeneratorInterface => $left->name() <=> $right->name(),
                        $right instanceof DeclareStrictTypesGeneratorInterface => self::ORDER_AFTER,
                        default => self::ORDER_SAME,
                    },
                    $left instanceof DeclareStrictTypesGeneratorInterface => match (true) {
                        $right instanceof NamespaceGeneratorInterface => self::ORDER_BEFORE,
                        default => self::ORDER_SAME,
                    },
                    default => self::ORDER_SAME,
                };
            }
        );

        return rtrim(array_reduce(
            $namespaces,
            static fn (
                string $buffer,
                GeneratorInterface $generator
            ): string => $buffer . $generator->generate() . self::NEWLINES,
            '<?php' . self::NEWLINES
        )) . self::NEWLINE;
    }

    /**
     * @param array<class-string<GeneratorInterface>,DeclareStrictTypesGeneratorInterface|NamespaceGeneratorInterface> $namespaces
     */
    public static function new(array $namespaces = [], bool $declareStrictTypes = true): self
    {
        return new self($namespaces, $declareStrictTypes);
    }
}
