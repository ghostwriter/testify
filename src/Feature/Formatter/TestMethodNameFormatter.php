<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Feature\Formatter;

use Override;

use function sprintf;

final readonly class TestMethodNameFormatter implements FormatterInterface
{
    #[Override]
    public function format(string $name): string
    {
        return sprintf('test_%s', $name);
    }
}
