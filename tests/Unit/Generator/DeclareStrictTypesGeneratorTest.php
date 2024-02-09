<?php 

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit\Generator;

use Ghostwriter\Testify\Generator\DeclareStrictTypesGenerator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DeclareStrictTypesGenerator::class)]
final class DeclareStrictTypesGeneratorTest extends TestCase
{
    public function testGenerate(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }
}
