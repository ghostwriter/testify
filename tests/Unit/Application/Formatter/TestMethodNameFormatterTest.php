<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Formatter;

use Ghostwriter\Testify\Application\Formatter\TestMethodNameFormatter;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(TestMethodNameFormatter::class)]
final class TestMethodNameFormatterTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
