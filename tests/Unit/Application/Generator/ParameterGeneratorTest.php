<?php

declare(strict_types=1);

namespace Tests\Unit\Application\Generator;

use Ghostwriter\Testify\Application\Generator\ParameterGenerator;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(ParameterGenerator::class)]
final class ParameterGeneratorTest extends AbstractTestCase
{
    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterTestifyApplicationGeneratorGeneratorInterface(): void
    {
        self::assertTrue(is_a(\Ghostwriter\Testify\Application\Generator\ParameterGenerator::class,\Ghostwriter\Testify\Application\Generator\GeneratorInterface::class,true));
    }
}
