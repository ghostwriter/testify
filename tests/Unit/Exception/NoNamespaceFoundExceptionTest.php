<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Exception;
use Ghostwriter\Testify\Exception\NoNamespaceFoundException;
use Ghostwriter\Testify\Interface\ExceptionInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use RuntimeException;
use Stringable;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(NoNamespaceFoundException::class)]
final class NoNamespaceFoundExceptionTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testExtendsException(): void
    {
        self::assertTrue(is_a(NoNamespaceFoundException::class, Exception::class, true));
    }

    /** @throws Throwable */
    public function testExtendsRuntimeException(): void
    {
        self::assertTrue(is_a(NoNamespaceFoundException::class, RuntimeException::class, true));
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceExceptionInterface(): void
    {
        self::assertTrue(is_a(NoNamespaceFoundException::class, ExceptionInterface::class, true));
    }

    /** @throws Throwable */
    public function testImplementsStringable(): void
    {
        self::assertTrue(is_a(NoNamespaceFoundException::class, Stringable::class, true));
    }

    /** @throws Throwable */
    public function testImplementsThrowable(): void
    {
        self::assertTrue(is_a(NoNamespaceFoundException::class, Throwable::class, true));
    }
}
