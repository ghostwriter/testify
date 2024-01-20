<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Testify\Exception\FailedToReadFileException;
use Ghostwriter\Testify\Exception\FileNotFoundException;
use PhpToken;

use const T_NAME_QUALIFIED;
use const T_NAMESPACE;
use const T_NS_SEPARATOR;

use function explode;
use function file_exists;
use function file_get_contents;
use function implode;

final class NamespaceDetector
{
    public function __invoke(string $file): array
    {
        if (! file_exists($file)) {
            throw new FileNotFoundException($file);
        }

        $fileContent = file_get_contents($file);
        if ($fileContent === false) {
            throw new FailedToReadFileException($file);
        }

        $tokens = PhpToken::tokenize($fileContent);

        $supported = [T_NAMESPACE, T_NAME_QUALIFIED, T_NS_SEPARATOR, ';'];

        $namespace = '';
        $inNamespace = false;
        foreach ($tokens as $token) {
            if (! $token->is($supported)) {
                continue;
            }

            if ($token->is(T_NAMESPACE)) {
                $inNamespace = true;
                continue;
            }

            if (! $inNamespace) {
                continue;
            }

            if ($token->is(';')) {
                break;
            }

            if ($token->is(T_NAME_QUALIFIED)) {
                $namespace .= $token->text;
                continue;
            }

            if (! $token->is(T_NS_SEPARATOR)) {
                continue;
            }

            $namespace .= '\\';
        }

        $namespaces = explode('\\', $namespace);

        $namespaces[1] .= 'Tests\\Unit';

        return [$namespace, implode('\\', $namespaces)];
    }
}
