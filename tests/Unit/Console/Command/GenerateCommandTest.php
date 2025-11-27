<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Command;

use Ghostwriter\Testify\Console\Command\GenerateCommand;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(GenerateCommand::class)]
final class GenerateCommandTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
