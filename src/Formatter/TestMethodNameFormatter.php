<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Formatter;

use Override;

final readonly class TestMethodNameFormatter implements FormatterInterface
{
    #[Override]
    public function format(string $name): string
    {
        return \sprintf('test_%s', $name);
    }
}
