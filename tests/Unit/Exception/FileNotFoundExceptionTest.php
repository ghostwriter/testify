<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Exception;

use Generator;
use Ghostwriter\Testify\Exception\FileNotFoundException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(FileNotFoundException::class)]
final class FileNotFoundExceptionTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProvidertestConstruct')]
    public function testConstruct(string $message, int $code, Throwable $previous): void
    {
        self::assertTrue(true);
    }

    final public function testGetCode(): void
    {
        self::assertTrue(true);
    }

    final public function testGetFile(): void
    {
        self::assertTrue(true);
    }

    final public function testGetLine(): void
    {
        self::assertTrue(true);
    }

    final public function testGetMessage(): void
    {
        self::assertTrue(true);
    }

    final public function testGetPrevious(): void
    {
        self::assertTrue(true);
    }

    final public function testGetTrace(): void
    {
        self::assertTrue(true);
    }

    final public function testGetTraceAsString(): void
    {
        self::assertTrue(true);
    }

    public function testToString(): void
    {
        self::assertTrue(true);
    }

    public function testWakeup(): void
    {
        self::assertTrue(true);
    }

    public static function dataProvidertestConstruct(): Generator
    {
        yield from [
            'testConstruct' => ['parameter-0', 'parameter-1', 'parameter-2'],
        ];
    }
}
