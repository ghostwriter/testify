<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Generator;

interface GeneratorInterface
{
    public const string INDENT = '    ';

    public const string NEWLINE = "\n";

    public const string NEWLINES = "\n\n";

    public const int ORDER_AFTER = 1;

    public const int ORDER_BEFORE = -1;

    public const int ORDER_SAME = 0;

    public const string SPACE = ' ';

    public function generate(): string;
}
