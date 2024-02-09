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
    public static function testInvokeDataProvider(): Generator
    {
        yield from [
            'testInvoke' => ['parameter-0'],
        ];
    }

    #[DataProvider('testInvokeDataProvider')]
    public function testInvoke(ContainerInterface $container): void
    {
        self::markTestSkipped('Not implemented yet.');
    }
}
