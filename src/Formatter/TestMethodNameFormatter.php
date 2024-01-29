<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Formatter;

use function sprintf;

final readonly class TestMethodNameFormatter
{
    public function format(string $methodName): string
    {
        return sprintf('test%s', $methodName);
    }
}
