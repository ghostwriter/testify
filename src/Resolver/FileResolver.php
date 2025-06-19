<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Resolver;

use Ghostwriter\Testify\Generator\NamespaceGenerator;
use PhpToken;

use const T_NAME_QUALIFIED;
use const T_NAMESPACE;
use const T_WHITESPACE;

final readonly class FileResolver
{
    public function __construct(
        private TestNamespaceResolver $testNamespaceResolver,
    ) {}

    /**
     * @param PhpToken $tokens
     */
    public function resolve(array $tokens): array
    {
        $inNamespace = false;
        $namespaces = [];
        $namespace = '';
        foreach ($tokens as $token) {
            $tokenId = $token->id;

            if (T_WHITESPACE === $tokenId) {
                continue;
            }

            if (T_NAMESPACE === $tokenId) {
                $namespace = '';
                $inNamespace = true;

                continue;
            }

            if (! $inNamespace) {
                continue;
            }

            $text = $token->text;

            if (T_NAME_QUALIFIED === $tokenId) {
                $namespace .= $text;

                continue;
            }

            if (';' === $text) {
                $inNamespace = false;

                $testNamespace = $this->testNamespaceResolver->resolve($namespace);

                $namespaces[$namespace] = [$testNamespace, new NamespaceGenerator($testNamespace)];
            }
        }

        return $namespaces;
    }
}
