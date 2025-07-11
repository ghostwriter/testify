<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Override;

use function array_reduce;
use function mb_rtrim;
use function usort;

final readonly class FileGenerator implements FileGeneratorInterface
{
    /**
     * @param NamespaceGeneratorInterface $namespaces
     */
    public function __construct(
        private array $namespaces,
        private bool $declareStrictTypes,
    ) {}

    /**
     * @param NamespaceGeneratorInterface $namespaces
     */
    public static function new(array $namespaces = [], bool $declareStrictTypes = true): self
    {
        return new self($namespaces, $declareStrictTypes);
    }

    #[Override]
    public function generate(): string
    {
        $namespaces = $this->namespaces;

        if ($this->declareStrictTypes) {
            $namespaces[] = new DeclareStrictTypesGenerator();
        }

        usort(
            $namespaces,
            static fn (GeneratorInterface $left, GeneratorInterface $right): int => match (true) {
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
            }
        );

        return mb_rtrim(array_reduce(
            $namespaces,
            static fn (
                string $buffer,
                GeneratorInterface $generator
            ): string => $buffer . $generator->generate() . self::NEWLINES,
            '<?php' . self::NEWLINES
        )) . self::NEWLINE;
    }
}
