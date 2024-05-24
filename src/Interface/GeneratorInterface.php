<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Interface;

interface GeneratorInterface
{
    public const int ORDER_BEFORE = -1;

    public const int ORDER_AFTER = 1;

    public const int ORDER_SAME = 0;

    public const string INDENT = '    ';

    public const string SPACE = ' ';

    public const string NEWLINE = "\n";

    public const string NEWLINES = "\n\n";

    public function generate(): string;
}
