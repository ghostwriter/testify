<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Formatter;

use Ghostwriter\Testify\Application\Formatter\FormatterInterface;
use Ghostwriter\Testify\Application\Formatter\TestMethodNameFormatter;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(TestMethodNameFormatter::class)]
final class TestMethodNameFormatterTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationFormatterFormatterInterface(): void
    {
        self::assertTrue(is_a(TestMethodNameFormatter::class, FormatterInterface::class, true));
    }
}
