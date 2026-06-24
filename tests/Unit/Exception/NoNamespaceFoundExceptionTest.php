<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Exception;
use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Exception\NoNamespaceFoundException;
use Ghostwriter\Testify\Interface\ExceptionInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use RuntimeException;
use Stringable;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(NoNamespaceFoundException::class)]
final class NoNamespaceFoundExceptionTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testExtendsException(): void
    {
        self::assertClassExtendsClass(NoNamespaceFoundException::class, Exception::class);
    }

    /** @throws Throwable */
    public function testExtendsRuntimeException(): void
    {
        self::assertClassExtendsClass(NoNamespaceFoundException::class, RuntimeException::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceExceptionInterface(): void
    {
        self::assertClassImplementsInterface(NoNamespaceFoundException::class, ExceptionInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsStringable(): void
    {
        self::assertClassImplementsInterface(NoNamespaceFoundException::class, Stringable::class);
    }

    /** @throws Throwable */
    public function testImplementsThrowable(): void
    {
        self::assertClassImplementsInterface(NoNamespaceFoundException::class, Throwable::class);
    }
}
