<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Ghostwriter\Testify\Exception\UseStatementNotFoundException;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(UseStatementNotFoundException::class)]
final class UseStatementNotFoundExceptionTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
