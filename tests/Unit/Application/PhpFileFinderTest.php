<?php

declare(strict_types=1);

namespace Tests\Unit\Application;

use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Ghostwriter\Testify\Application\FinderInterface;
use Ghostwriter\Testify\Application\PhpFileFinder;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(PhpFileFinder::class)]
final class PhpFileFinderTest extends AbstractTestCase
{
    use AssertionsTrait;

    /** @throws Throwable */
    public function testImplementsGhostwriterTestifyApplicationFinderInterface(): void
    {
        self::assertClassImplementsInterface(PhpFileFinder::class, FinderInterface::class);
    }
}
