<?php

declare(strict_types=1);

namespace Tests\Unit\Resolver;

use Ghostwriter\Testify\Resolver\FileResolver;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(FileResolver::class)]
final class FileResolverTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
