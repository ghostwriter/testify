<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface;

interface FormatterInterface
{
    public function format(string $name): string;
}
