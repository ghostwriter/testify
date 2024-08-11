<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container\Factory;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\FactoryInterface;
use Ghostwriter\Testify\Console\Handler\TestifyCommandHandler;
use Ghostwriter\Testify\Console\Handlers;
use Override;
use Throwable;

/**
 * @implements FactoryInterface<Handlers>
 */
final readonly class HandlersFactory implements FactoryInterface
{
    /**
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container): Handlers
    {
        return Handlers::new($container->get(TestifyCommandHandler::class));
    }
}
