<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Ghostwriter\Testify\TestifyCommand;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TestifyCommand::class)]
final class TestifyCommandTest extends TestCase
{
    public function testExample(): void
    {
        self::markTestSkipped('TODO: Implement test.');
    }
}
