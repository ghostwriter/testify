<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\Generator\DeclareStrictTypesGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\FileGeneratorInterface;
use Ghostwriter\Testify\Interface\Generator\NamespaceGeneratorInterface;
use Ghostwriter\Testify\Interface\GeneratorInterface;

use function rtrim;
use function usort;

final class FileGenerator implements FileGeneratorInterface
{
    /**
     * @param list<DeclareStrictTypesGeneratorInterface|NamespaceGeneratorInterface> $namespaces
     */
    public function __construct(
        private array $namespaces
    ) {
    }

    public function declareStrictTypes(): self
    {
        $this->namespaces[DeclareStrictTypesGeneratorInterface::class] ??= new DeclareStrictTypesGenerator();

        return $this;
    }

    public function generate(): string
    {
        usort(
            $this->namespaces,
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

        $code = '<?php ' . self::NEWLINES;

        foreach ($this->namespaces as $namespace) {
            $code .= $namespace->generate() . self::NEWLINES;
        }

        return rtrim($code) . self::NEWLINE;
    }

    /**
     * @param list<DeclareStrictTypesGeneratorInterface|NamespaceGeneratorInterface> $namespaces
     */
    public static function new(array $namespaces = []): self
    {
        return new self($namespaces);
    }
}
