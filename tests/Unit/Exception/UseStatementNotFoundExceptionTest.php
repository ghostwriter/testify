<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Exception;
use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Exception\UseStatementNotFoundException;
use Ghostwriter\Testify\Interface\ExceptionInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use RuntimeException;
use Stringable;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(UseStatementNotFoundException::class)]
final class UseStatementNotFoundExceptionTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testExtendsException(): void
    {
        self::assertClassExtendsClass(UseStatementNotFoundException::class, Exception::class);
    }

    /** @throws Throwable */
    public function testExtendsRuntimeException(): void
    {
        self::assertClassExtendsClass(UseStatementNotFoundException::class, RuntimeException::class);
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceExceptionInterface(): void
    {
        self::assertClassImplementsInterface(UseStatementNotFoundException::class, ExceptionInterface::class);
    }

    /** @throws Throwable */
    public function testImplementsStringable(): void
    {
        self::assertClassImplementsInterface(UseStatementNotFoundException::class, Stringable::class);
    }

    /** @throws Throwable */
    public function testImplementsThrowable(): void
    {
        self::assertClassImplementsInterface(UseStatementNotFoundException::class, Throwable::class);
    }
}
