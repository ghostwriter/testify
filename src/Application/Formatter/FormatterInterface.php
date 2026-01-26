<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application\Formatter;

interface FormatterInterface
{
    public function format(string $name): string;
}
