<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Resolver;

use Ghostwriter\Testify\Application\Resolver\FileResolver;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(FileResolver::class)]
final class FileResolverTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
