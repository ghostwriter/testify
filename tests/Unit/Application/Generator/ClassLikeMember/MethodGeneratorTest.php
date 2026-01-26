<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator\ClassLikeMember;

use Ghostwriter\Testify\Application\Generator\ClassLikeMember\MethodGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;

#[CoversClass(MethodGenerator::class)]
final class MethodGeneratorTest extends AbstractTestCase
{
    public function testExample(): void
    {
        self::assertTrue(true);
    }
}
