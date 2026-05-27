<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Formatter;

use Ghostwriter\Testify\Application\Formatter\FormatterInterface;
use Ghostwriter\Testify\Application\Formatter\TestDataProviderMethodNameFormatter;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(TestDataProviderMethodNameFormatter::class)]
final class TestDataProviderMethodNameFormatterTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationFormatterFormatterInterface(): void
    {
        self::assertTrue(is_a(TestDataProviderMethodNameFormatter::class, FormatterInterface::class, true));
    }
}
