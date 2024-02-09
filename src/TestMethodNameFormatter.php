<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Testify\Interface\FormatterInterface;

use function sprintf;

final readonly class TestMethodNameFormatter implements FormatterInterface
{
    public function format(string $name): string
    {
        return sprintf('test%s', $name);
    }
}
