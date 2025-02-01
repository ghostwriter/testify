<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container\Factory;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\FactoryInterface;
use Ghostwriter\Testify\Value\Argv;
use Override;
use Throwable;

/**
 * @implements FactoryInterface<Argv>
 */
final readonly class ArgvFactory implements FactoryInterface
{
    /**
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container): Argv
    {
        return Argv::new($_SERVER['argv'] ?? []);
    }
}
