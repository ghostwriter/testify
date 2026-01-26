<?php

declare(strict_types=1);

namespace Tests\Unit\Container\Ghostwriter\Testify;

use Ghostwriter\Testify\Container\Ghostwriter\Testify\HandlerProviderExtension;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(HandlerProviderExtension::class)]
final class HandlerProviderExtensionTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
