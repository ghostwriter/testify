<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Formatter;

use Ghostwriter\Testify\Application\Formatter\TestDataProviderMethodNameFormatter;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(TestDataProviderMethodNameFormatter::class)]
final class TestDataProviderMethodNameFormatterTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
