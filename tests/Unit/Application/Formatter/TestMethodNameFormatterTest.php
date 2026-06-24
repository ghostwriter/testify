<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Formatter;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\Formatter\FormatterInterface;
use Ghostwriter\Testify\Application\Formatter\TestMethodNameFormatter;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(TestMethodNameFormatter::class)]
final class TestMethodNameFormatterTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationFormatterFormatterInterface(): void
    {
        self::assertClassImplementsInterface(TestMethodNameFormatter::class, FormatterInterface::class);
    }
}
