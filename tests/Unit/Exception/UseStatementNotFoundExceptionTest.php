<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Exception;
use Ghostwriter\Testify\Exception\UseStatementNotFoundException;
use Ghostwriter\Testify\Interface\ExceptionInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use RuntimeException;
use Stringable;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(UseStatementNotFoundException::class)]
final class UseStatementNotFoundExceptionTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testExtendsException(): void
    {
        self::assertTrue(is_a(UseStatementNotFoundException::class, Exception::class, true));
    }

    /** @throws Throwable */
    public function testExtendsRuntimeException(): void
    {
        self::assertTrue(is_a(UseStatementNotFoundException::class, RuntimeException::class, true));
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceExceptionInterface(): void
    {
        self::assertTrue(is_a(UseStatementNotFoundException::class, ExceptionInterface::class, true));
    }

    /** @throws Throwable */
    public function testImplementsStringable(): void
    {
        self::assertTrue(is_a(UseStatementNotFoundException::class, Stringable::class, true));
    }

    /** @throws Throwable */
    public function testImplementsThrowable(): void
    {
        self::assertTrue(is_a(UseStatementNotFoundException::class, Throwable::class, true));
    }
}
