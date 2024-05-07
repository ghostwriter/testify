<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Formatter;

use Ghostwriter\Testify\Interface\FormatterInterface;
use Override;

use function sprintf;

final readonly class TestDataProviderMethodNameFormatter implements FormatterInterface
{
    #[Override]
    public function format(string $name): string
    {
        return sprintf('dataProvider_%s', $name);
    }
}
