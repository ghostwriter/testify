<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container\Factory;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\FactoryInterface;
use Ghostwriter\Testify\Command\Handlers;
use Ghostwriter\Testify\Handler\TestifyCommandHandler;
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
