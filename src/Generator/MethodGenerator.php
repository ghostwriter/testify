<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

use Ghostwriter\Testify\Interface\GeneratorInterface;

use function array_merge;
use function rtrim;

final readonly class MethodGenerator implements GeneratorInterface
{
    public function __construct(
        private string $name,
        private string $returnType = '',
        private array $uses = [],
        private array $parameters = [],
        private array $body = [],
        private array $attributes = [],
        private bool $isStatic = false,
        private bool $isFinal = false,
        private bool $isAbstract = false,
        private bool $isPublic = false,
        private bool $isProtected = false,
        private bool $isPrivate = false,
        private bool $isAnonymous = false,
    ) {
    }

    public function generate(): string
    {
        $method = '';

        foreach ($this->attributes as $attribute) {
            $method .= $attribute->generate() . self::NEWLINE . self::INDENT;
        }

        if ($this->isFinal) {
            $method .= 'final ';
        }

        if ($this->isAbstract) {
            $method .= 'abstract ';
        }
        if ($this->isPublic) {
            $method .= 'public ';
        }

        if ($this->isProtected) {
            $method .= 'protected ';
        }

        if ($this->isPrivate) {
            $method .= 'private ';
        }

        if ($this->isStatic) {
            $method .= 'static ';
        }

        $method .= 'function ';

        if (! $this->isAnonymous) {
            $method .= $this->name;
        }

        $method .= '(';

        foreach ($this->parameters as $parameter) {
            $method .= $parameter->generate() . ', ';
        }

        $method = rtrim($method, ', ');

        $method .= ')';

        if ($this->returnType !== null) {
            $method .= ': ' . $this->returnType . self::NEWLINE;
        }

        $method .=  self::INDENT . '{' . self::NEWLINE;

        foreach ($this->body as $line) {
            $method .= self::INDENT . self::INDENT . $line->generate() . self::NEWLINES;
        }

        return rtrim($method) . self::NEWLINE . self::INDENT . '}';
    }

    public function uses(): array
    {
        $uses = $this->uses;

        foreach ($this->parameters as $parameter) {
            $uses = array_merge($uses, $parameter->uses());
        }

        return $uses;
    }
}
