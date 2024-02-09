<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Generator;
use Ghostwriter\Testify\Generator\NamespaceGenerator;
use PhpToken;

use const T_NAME_QUALIFIED;
use const T_NAMESPACE;
use const T_WHITESPACE;

final class FileResolver
{
    public function __construct(
        private TestNamespaceResolver $testNamespaceResolver,
    ) {
    }

    /**
     * @param list<PhpToken> $tokens
     */
    public function resolve(array $tokens): array
    {
        $inNamespace = false;
        $namespaces = [];
        $namespace = '';
        $tokensGenerator = $this->generator($tokens);
        foreach ($tokensGenerator as $tokenId => $token) {
            if ($tokenId === T_NAMESPACE) {
                $namespace = '';
                $inNamespace = true;

                continue;
            }

            if (! $inNamespace) {
                continue;
            }

            $text = $token->text;
            if ($tokenId === T_NAME_QUALIFIED) {
                $namespace .= $text;

                continue;
            }

            if ($text === ';') {
                $inNamespace = false;

                $testNamespace = $this->testNamespaceResolver->resolve($namespace);

                $namespaces[$namespace] = [$testNamespace, new NamespaceGenerator($testNamespace)];
            }
        }

        return $namespaces;
    }

    private function generator(array $tokens): Generator
    {
        foreach ($tokens as $token) {
            $tokenId = $token->id;
            if ($tokenId === T_WHITESPACE) {
                continue;
            }

            yield $tokenId => $token;
        }
    }
}
