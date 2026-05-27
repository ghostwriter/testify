<?php

declare(strict_types=1);

namespace Tests\Unit\Application;

use Ghostwriter\Testify\Application\ArgvParser;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(ArgvParser::class)]
final class ArgvParserTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
