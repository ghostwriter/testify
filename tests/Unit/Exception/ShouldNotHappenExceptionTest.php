<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Exception;
use Ghostwriter\Testify\Exception\ShouldNotHappenException;
use Ghostwriter\Testify\Interface\ExceptionInterface;
use LogicException;
use PHPUnit\Framework\Attributes\CoversClass;
use Stringable;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(ShouldNotHappenException::class)]
final class ShouldNotHappenExceptionTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testExtendsException(): void
    {
        self::assertTrue(is_a(ShouldNotHappenException::class, Exception::class, true));
    }

    /** @throws Throwable */
    public function testExtendsLogicException(): void
    {
        self::assertTrue(is_a(ShouldNotHappenException::class, LogicException::class, true));
    }

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyInterfaceExceptionInterface(): void
    {
        self::assertTrue(is_a(ShouldNotHappenException::class, ExceptionInterface::class, true));
    }

    /** @throws Throwable */
    public function testImplementsStringable(): void
    {
        self::assertTrue(is_a(ShouldNotHappenException::class, Stringable::class, true));
    }

    /** @throws Throwable */
    public function testImplementsThrowable(): void
    {
        self::assertTrue(is_a(ShouldNotHappenException::class, Throwable::class, true));
    }
}
