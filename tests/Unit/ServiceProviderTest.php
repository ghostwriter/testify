<?php

declare(strict_types=1);

namespace Ghostwriter\TestifyTests\Unit;

use Generator;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Testify\ServiceProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(ServiceProvider::class)]
final class ServiceProviderTest extends TestCase
{
    protected function setUp(): void
    {
        self::markTestSkipped('Not implemented yet.');
    }

    #[DataProvider('dataProviderTestInvoke')]
    public function testInvoke(ContainerInterface $container): void
    {
        self::assertTrue(true);
    }

    public static function dataProviderTestInvoke(): Generator
    {
        yield from [
            'testInvoke' => ['parameter-0'],
        ];
    }
}
