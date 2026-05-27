<?php

declare(strict_types=1);

namespace Tests\Unit\Application;

use Ghostwriter\Testify\Application\FinderInterface;
use Ghostwriter\Testify\Application\PhpFileFinder;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

use function is_a;

#[CoversClass(PhpFileFinder::class)]
final class PhpFileFinderTest extends AbstractTestCase
{
    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationFinderInterface(): void
    {
        self::assertTrue(is_a(PhpFileFinder::class, FinderInterface::class, true));
    }
}
