<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Ghostwriter\Testify\NamespaceDetector;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(NamespaceDetector::class)]
final class NamespaceDetectorTest extends TestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
