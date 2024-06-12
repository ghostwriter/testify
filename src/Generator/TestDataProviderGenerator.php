<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\GeneratorInterface;
use Override;

use function implode;
use function sprintf;

final readonly class TestDataProviderGenerator implements GeneratorInterface
{
    /**
     * @param array<ParameterGenerator> $parameters
     */
    public function __construct(
        private string $name,
        private array $parameters
    ) {
    }

    #[Override]
    public function generate(): string
    {
        $data = [];
        $position = 0;
        foreach ($this->parameters as $parameter) {
            $data[$parameter->name()] = sprintf("'parameter-%d'", $position++);
        }

        $lines = ['yield from ['];
        $lines[] = sprintf(
            "%s'%s' => [%s],",
            self::INDENT . self::INDENT . self::INDENT,
            $this->name,
            implode(', ', $data)
        );

        $lines[] = self::INDENT . self::INDENT . '];';

        return implode(self::NEWLINE, $lines);
    }
}
