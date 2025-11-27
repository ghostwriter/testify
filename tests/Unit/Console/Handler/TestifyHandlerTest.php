<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Handler;

use Ghostwriter\Testify\Console\Handler\TestifyHandler;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(TestifyHandler::class)]
final class TestifyHandlerTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
