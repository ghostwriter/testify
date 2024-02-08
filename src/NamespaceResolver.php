<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use PhpToken;

use const T_NAME_QUALIFIED;
use const T_NAMESPACE;
use const T_WHITESPACE;

final readonly class NamespaceResolver
{
    /**
     * @param list<PhpToken> $tokens
     */
    public function resolve(array $tokens): string
    {
        $namespace = '';
        $inNamespace = false;
        foreach ($tokens as $token) {
            $tokenKind = $token->id;

            if ($tokenKind === T_NAMESPACE) {
                $inNamespace = true;

                continue;
            }

            if (! $inNamespace || $tokenKind === T_WHITESPACE) {
                continue;
            }

            $text = $token->text;
            if ($tokenKind === T_NAME_QUALIFIED) {
                $namespace .= $text;

                continue;
            }

            if ($text === ';') {
                break;
            }
        }

        return $namespace;
    }
}
